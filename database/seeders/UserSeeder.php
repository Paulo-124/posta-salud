<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@posta.test'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
                'rol' => 'administrador',
            ]
        );

        User::updateOrCreate(
            ['email' => 'medico@posta.test'],
            [
                'name' => 'Medico Principal',
                'password' => Hash::make('password'),
                'rol' => 'personal_medico',
            ]
        );

        User::updateOrCreate(
            ['email' => 'recepcion@posta.test'],
            [
                'name' => 'Recepcionista',
                'password' => Hash::make('password'),
                'rol' => 'recepcion',
            ]
        );
    }
}
