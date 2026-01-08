@extends('layouts.admin')

@section('title', 'Demandas')
@section('page-title', 'Minhas Demandas')

@section('content')

@include('components.alerts')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Demandas</h3>
        <a href="{{ route('demandas.create') }}" class="btn btn-primary float-right">
            Nova Demanda
        </a>
    </div>

    <div class="card-body">
        {{-- tabela --}}
    </div>
</div>

@endsection
