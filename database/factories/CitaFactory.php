<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\PersonalMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    protected $model = Cita::class;

    public function definition(): array
    {
        $fechaHora = fake()->dateTimeBetween('+1 days', '+10 days');

        return [
            'paciente_id' => Paciente::factory(),
            'personal_medico_id' => PersonalMedico::factory(),
            'fecha_hora' => $fechaHora,
            'fecha_hora_fin' => (clone $fechaHora)->modify('+30 minutes'),
            'motivo' => fake()->sentence(6),
            'estado' => 'pendiente',
        ];
    }
}
