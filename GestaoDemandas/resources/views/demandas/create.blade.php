@extends('layouts.formlayout')

@section('title', 'Nova Demanda')
@section('page-title', 'Criar Demanda')

@section('content')

@include('components.alerts')

<div class="card">
    <form action="{{ route('demandas.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
            </div>
 
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Selecione</option>
                    <option value="1" @selected(old('status') == 1)>Aberto</option>
                    <option value="2" @selected(old('status') == 2)>Em Análise</option>
                    <option value="3" @selected(old('status') == 3)>Concluído</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_entrega">Data de Entrega</label>
                <input type="datetime-local" name="data_entrega" id="data_entrega" class="form-control" value="{{ old('data_entrega') }}" required>
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('demandas.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

@endsection
