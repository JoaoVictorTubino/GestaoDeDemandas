<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use App\Http\Requests\StoreDemandaRequest;
use App\Http\Requests\UpdateDemandaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DemandaController extends Controller
{
    use AuthorizesRequests;

    /*
    Escolhi delegar a filtragem das demandas ao relacionamento do usuário 
    autenticado para garantir que apenas os registros próprios daquele usuário sejam listados.
    */
    public function index()
    {
        $demandas = Auth::user()
            ->demandas()
            ->latest()
            ->get();

        return view('demandas.index', compact('demandas'));
    }

    /*
    Escolhi por autorizar a criação da demanda via Policy para manter a consistência com as demais operações protegidas do sistema.
    */
    public function create()
    {
        $this->authorize('create', Demanda::class);

        return view('demandas.create');
    }

    /*
    Escolhi utilizar o Form Request dedicado para centralizar as regras de validação 
    e garantir que todas sejam aplicadas antes de persistir os dados.
    */
    public function store(StoreDemandaRequest $request)
    {
        $this->authorize('create', Demanda::class);

        $dadosValidados = $request->validated();

        $demanda = new Demanda();
        $demanda->titulo = $dadosValidados['titulo'];
        $demanda->descricao = $dadosValidados['descricao'] ?? null;
        $demanda->status = $dadosValidados['status'];
        $demanda->data_entrega = $dadosValidados['data_entrega'];
        $demanda->user_id = Auth::id();

        $demanda->save();

        session()->flash('success', 'Demanda criada com sucesso!');
        return redirect('demandas');
    }

    /*
    Escolhi utilizar a autorização via Policy para impedir que usuários visualizem demandas que não lhe pertencem.
    */
    public function show(Demanda $demanda)
    {
        $this->authorize('view', $demanda);

        return view('demandas.show', compact('demanda'));
    }

    /*
    Escolhi utilizar a autorização via Policy de update para garantir que apenas o dono da demanda tenha acesso ao formulário de edição.
    */
    public function edit(Demanda $demanda)
    {
        $this->authorize('update', $demanda);

        return view('demandas.edit', compact('demanda'));
    }

    /*
    Escolhi manter a validação da função update através de um Form Request dedicado para evitar duplicidade de regras no código.
    */
    public function update(UpdateDemandaRequest $request, Demanda $demanda)
    {
        $this->authorize('update', $demanda);

        $dadosValidados = $request->validated();

        $demanda->titulo = $dadosValidados['titulo'];
        $demanda->descricao = $dadosValidados['descricao'] ?? null;
        $demanda->status = $dadosValidados['status'];
        $demanda->data_entrega = $dadosValidados['data_entrega'];

        $demanda->save();

        session()->flash('success', 'Demanda atualizada com sucesso!');
        return redirect('demandas');
    }

    /*
    Escolhi utilizar a exclusão lógica para preservar o histórico de dados, alinhando a operação de remoção com o uso do Soft Delete.
    */
    public function destroy(Demanda $demanda)
    {
        $this->authorize('delete', $demanda);

        $demanda->delete();

        session()->flash('success', 'Demanda removida com sucesso!');
        return redirect('demandas');
    }
}
