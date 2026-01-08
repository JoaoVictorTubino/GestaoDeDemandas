@extends('layouts.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalDemandas }}</h3>
                <p>Total de Demandas</p>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
            <a href="{{ route('demandas.index') }}" class="small-box-footer">
                Ver todas <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $demandasAbertas }}</h3>
                <p>Demandas em Aberto</p>
            </div>
            <div class="icon">
                <i class="fas fa-folder-open"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $demandasEmAnalise }}</h3>
                <p>Em Análise</p>
            </div>
            <div class="icon">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $demandasConcluidas }}</h3>
                <p>Concluídas</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Últimas Demandas Cadastradas</h3>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Entrega</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($ultimasDemandas as $demanda)
                    <tr>
                        <td>{{ $demanda->titulo }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $demanda->statusLabel() }}
                            </span>
                        </td>
                        <td>{{ $demanda->data_entrega->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Nenhuma demanda encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
