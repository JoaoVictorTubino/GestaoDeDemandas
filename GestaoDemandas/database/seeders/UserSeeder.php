<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'teste@gmail.com'],
            [
                'nome' => 'Usuário Teste',
                'password' => Hash::make('12345678'),
                'foto' => 'usuarios/default.png', 
            ]
        );
    }
}
