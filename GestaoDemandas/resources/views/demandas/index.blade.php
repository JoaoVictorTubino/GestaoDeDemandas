@extends('layouts.layout')

@section('title', 'Minhas Demandas')
@section('page-title', 'Demandas')

@section('content')

@include('components.alerts')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Lista de Demandas</h3>

        @can('create', App\Models\Demanda::class)
            <a href="{{ route('demandas.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nova Demanda
            </a>
        @endcan
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Entrega</th>
                    <th class="text-center" width="160">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($demandas as $demanda)
                    <tr>
                        <td>{{ $demanda->titulo }}</td>

                        <td>
                            <span class="badge badge-info">
                                {{ $demanda->statusLabel() }}
                            </span>
                        </td>

                        <td>{{ $demanda->data_entrega->format('d/m/Y H:i') }}</td>

                        <td class="text-center">
                            @can('view', $demanda)
                                <a href="{{ route('demandas.show', $demanda) }}"
                                   class="btn btn-info btn-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endcan

                            @can('update', $demanda)
                                <a href="{{ route('demandas.edit', $demanda) }}"
                                   class="btn btn-warning btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endcan

                            @can('delete', $demanda)
                                <form action="{{ route('demandas.destroy', $demanda) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-xs"
                                            onclick="return confirm('Deseja realmente excluir esta demanda?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Nenhuma demanda cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
