<?php

namespace Database\Factories;

use App\Models\PersonalMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalMedicoFactory extends Factory
{
    protected $model = PersonalMedico::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'dni' => fake()->unique()->numerify('########'),
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName() . ' ' . fake()->lastName(),
            'especialidad' => fake()->randomElement([
                'Medicina General',
                'Pediatría',
                'Odontología',
                'Enfermería',
                'Obstetricia',
            ]),
            'colegiatura' => fake()->unique()->numerify('#####'),
            'activo' => true,
        ];
    }

    public function inactivo(): static
    {
        return $this->state(fn (array $attributes) => [
            'activo' => false,
        ]);
    }
}
