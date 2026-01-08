@extends('layouts.layout')

@section('title', 'Visualizar Demanda')
@section('page-title', 'Detalhes da Demanda')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informações da Demanda</h3>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Título</dt>
            <dd class="col-sm-9">{{ $demanda->titulo }}</dd>
            <dt class="col-sm-3">Descrição</dt>
            <dd class="col-sm-9">{{ $demanda->descricao ?? '-' }}</dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
            <span class="badge badge-info">{{ $demanda->statusLabel() }}</span>
            </dd>
            <dt class="col-sm-3">Data de Entrega</dt>
            <dd class="col-sm-9">{{ $demanda->data_entrega->format('d/m/Y H:i') }}</dd>
            <dt class="col-sm-3">Demanda Criada Em</dt>
            <dd class="col-sm-9">{{ $demanda->created_at->format('d/m/Y H:i') }}</dd>
        </dl>

    </div>
            <div class="card-footer">
            <a href="{{ route('demandas.index') }}" class="btn btn-secondary">Voltar</a>

            @can('update', $demanda)
                <a href="{{ route('demandas.edit', $demanda) }}" class="btn btn-warning"> Editar</a>
            @endcan
        </div>

</div>

@endsection
