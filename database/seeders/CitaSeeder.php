<?php

namespace Database\Seeders;

use App\Models\Atencion;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\PersonalMedico;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    public function run(): void
    {
        $pacientesUsados = [];

        $medicos = PersonalMedico::where('activo', true)->get();

        $horarios = [
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
        ];

        for ($dia = -3; $dia <= 3; $dia++) {
            $fecha = Carbon::today()->addDays($dia);

            // Omitir sábados y domingos.
            if ($fecha->isWeekend()) {
                continue;
            }

            foreach ($medicos as $medico) {
                foreach ($horarios as $hora) {

                    // Dejar aproximadamente el 40% de horarios libres.
                    if (fake()->boolean(40)) {
                        continue;
                    }

                    $fechaHora = $fecha->copy()->setTimeFromTimeString($hora);

                    $claveHorario = $fechaHora->format('Y-m-d H:i:s');

                    $pacientesDisponibles = Paciente::whereNotIn(
                        'id',
                        $pacientesUsados[$claveHorario] ?? []
                    )->get();

                    if ($pacientesDisponibles->isEmpty()) {
                        continue;
                    }

                    $paciente = $pacientesDisponibles->random();

                    $pacientesUsados[$claveHorario][] = $paciente->id;

                    $estado = $fechaHora->isPast()
                        ? fake()->randomElement([
                            'atendida',
                            'atendida',
                            'atendida',
                            'cancelada',
                        ])
                        : fake()->randomElement([
                            'pendiente',
                            'confirmada',
                            'confirmada',
                            'cancelada',
                        ]);

                    $cita = Cita::create([
                        'paciente_id' => $paciente->id,
                        'personal_medico_id' => $medico->id,
                        'fecha_hora' => $fechaHora,
                        'fecha_hora_fin' => $fechaHora->copy()->addMinutes(30),
                        'motivo' => fake()->sentence(6),
                        'estado' => $estado,
                    ]);

                    if ($estado === 'atendida') {
                        Atencion::create([
                            'cita_id' => $cita->id,
                            'diagnostico' => fake()->sentence(10),
                            'tratamiento' => fake()->sentence(12),
                            'observaciones' => fake()->optional()->sentence(10),
                        ]);
                    }
                }
            }
        }
    }
}
