<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Demanda;

class DashboardController extends Controller
/*
Escolhi construir os dados do dashboard a partir do relacionamento do usuário autenticado,
garantindo que as métricas exibidas reflitam apenas as demandas pertencentes a ele.
*/

{
    public function index()
    {
        $user = Auth::user();

        $totalDemandas = $user->demandas()->count();

        $demandasAbertas = $user->demandas()
            ->where('status', 1)->count();

        $demandasEmAnalise = $user->demandas()
            ->where('status', 2)->count(); 

        $demandasConcluidas = $user->demandas()
            ->where('status', 3)->count();

        $ultimasDemandas = $user->demandas()->latest()->limit(5)->get();

        return view('dashboard.index', compact(
            'totalDemandas',
            'demandasAbertas',
            'demandasEmAnalise',
            'demandasConcluidas',
            'ultimasDemandas'
        ));
    }
}
