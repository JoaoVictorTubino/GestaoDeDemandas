<?php

namespace Database\Seeders;

use App\Models\Demanda;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemandaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'teste@gmail.com')->first();

        if (!$user) {
            return;
        }

        $demandas = [
            'Salvar o mundo',
            'Derrotar Sephiroth',
            'Viajar até o Japão',
            'Derrubar a Yakuza',
            'Ajudar meus amigos',
        ];

        foreach ($demandas as $titulo) {
            Demanda::create([
                'titulo' => $titulo,
                'descricao' => 'Demanda fictícia gerada por seeder',
                'status' => 1, 
                'data_entrega' => now()->addDays(rand(1, 10)),
                'user_id' => $user->id,
            ]);
        }

        foreach ($demandas as $titulo) {
            Demanda::create([
                'titulo' => $titulo,
                'descricao' => 'Demanda fictícia gerada por seeder',
                'status' => 2, 
                'data_entrega' => now()->addDays(rand(1, 10)),
                'user_id' => $user->id,
            ]);
        }

        foreach ($demandas as $titulo) {
            Demanda::create([
                'titulo' => $titulo,
                'descricao' => 'Demanda fictícia gerada por seeder',
                'status' => 3, 
                'data_entrega' => now()->addDays(rand(1, 10)),
                'user_id' => $user->id,
            ]);
        }
    }

}
