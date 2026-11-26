<?php

namespace App\Http\Controllers;

use App\Models\PersonalMedico;
use App\Http\Requests\StorePersonalMedicoRequest;
use App\Http\Requests\UpdatePersonalMedicoRequest;
use Illuminate\Http\Request;

class PersonalMedicoController extends Controller
{
    public function index(Request $request)
    {
        $buscar       = trim($request->input('buscar', ''));
        $especialidad = $request->input('especialidad');
        $estado       = $request->input('estado', 'activos');

        $personal = PersonalMedico::query()
            ->deEspecialidad($especialidad)
            ->when($estado === 'activos', fn ($q) => $q->activos())
            ->when($estado === 'inactivos', fn ($q) => $q->where('activo', false))
            ->when($buscar, function ($q, $buscar) {
                $q->where(function ($q) use ($buscar) {
                    $q->where('apellidos', 'ilike', "%$buscar%")
                      ->orWhere('dni', 'like', "$buscar%")
                      ->orWhere('colegiatura', 'like', "$buscar%");
                });
            })
            ->withCount('citas')
            ->orderBy('apellidos')
            ->paginate(10)
            ->withQueryString();

        return view('personal-medico.index',
            compact('personal', 'buscar', 'especialidad', 'estado'));
    }

    public function create()
    {
        $especialidades = PersonalMedico::ESPECIALIDADES;

        return view('personal-medico.create', compact('especialidades'));
    }

    public function store(StorePersonalMedicoRequest $request)
    {
        $medico = PersonalMedico::create($request->validated());

        return redirect()
            ->route('personal-medico.show', $medico)
            ->with('ok', 'Profesional registrado correctamente.');
    }

    public function show(PersonalMedico $personalMedico)
    {
        $personalMedico->loadCount('citas');

        $proximasCitas = $personalMedico->citas()
            ->with('paciente')
            ->where('estado', 'programada')
            ->where('fecha_hora', '>=', now())
            ->orderBy('fecha_hora')
            ->limit(10)
            ->get();

        return view('personal-medico.show', [
            'medico'        => $personalMedico,
            'proximasCitas' => $proximasCitas,
        ]);
    }

    public function edit(PersonalMedico $personalMedico)
    {
        $especialidades = PersonalMedico::ESPECIALIDADES;

        return view('personal-medico.edit', [
            'medico'         => $personalMedico,
            'especialidades' => $especialidades,
        ]);
    }

    public function update(UpdatePersonalMedicoRequest $request, PersonalMedico $personalMedico)
    {
        $personalMedico->update($request->validated());

        return redirect()
            ->route('personal-medico.show', $personalMedico)
            ->with('ok', 'Datos actualizados correctamente.');
    }
}