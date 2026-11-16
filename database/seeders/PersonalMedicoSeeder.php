<?php

namespace Database\Seeders;

use App\Models\PersonalMedico;
use App\Models\User;
use Illuminate\Database\Seeder;

class PersonalMedicoSeeder extends Seeder
{
    public function run(): void
    {
        $usuarioMedico = User::where('email', 'medico@posta.test')->first();

        PersonalMedico::updateOrCreate(
            ['dni' => '40111111'],
            [
                'user_id' => $usuarioMedico->id,
                'nombres' => 'Juan',
                'apellidos' => 'Quispe Mamani',
                'especialidad' => 'Medicina General',
                'colegiatura' => '10001',
                'activo' => true,
            ]
        );

        PersonalMedico::factory()->count(4)->create();

        PersonalMedico::factory()->inactivo()->create();
    }
}
