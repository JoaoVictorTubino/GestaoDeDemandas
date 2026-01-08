@extends('layouts.formlayout')

@section('title', 'Editar Demanda')
@section('page-title', 'Editar Demanda')

@section('content')

@include('components.alerts')

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Demanda</h3>
    </div>

    <form action="{{ route('demandas.update', $demanda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $demanda->titulo) }}" required>
                @error('titulo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="4">{{ old('descricao', $demanda->descricao) }}</textarea>
                @error('descricao')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="1" @selected(old('status', $demanda->status) == 1)>Aberto</option>
                    <option value="2" @selected(old('status', $demanda->status) == 2)>Em Análise</option>
                    <option value="3" @selected(old('status', $demanda->status) == 3)>Concluído</option>
                </select>

                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_entrega">Data de Entrega</label>
                <input type="datetime-local" name="data_entrega" id="data_entrega" class="form-control @error('data_entrega') is-invalid @enderror" value="{{ old('data_entrega', optional($demanda->data_entrega)->format('Y-m-d\TH:i')) }}" required>
                @error('data_entrega')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('demandas.index') }}" class="btn btn-secondary">Voltar</a>

            <button type="submit" class="btn btn-warning">Atualizar</button>
        </div>
    </form>
</div>

@endsection
