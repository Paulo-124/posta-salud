@extends('layouts.app')

@section('titulo', $medico->apellidos . ', ' . $medico->nombres)

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>{{ $medico->apellidos }}, {{ $medico->nombres }}</h1>
        <div class="acciones">
            <a href="{{ route('personal-medico.edit', $medico) }}" role="button">Editar datos</a>
            <a href="{{ route('personal-medico.index') }}" role="button" class="secondary">Volver</a>
        </div>
    </div>

    <article>
        <p><strong>Estado:</strong> <x-estado :activo="$medico->activo" /></p>
        <p><strong>Especialidad:</strong> {{ $medico->especialidad }}</p>
        <p><strong>Colegiatura:</strong> {{ $medico->colegiatura }}</p>
        <p><strong>DNI:</strong> {{ $medico->dni }}</p>
        <p><strong>Total de citas registradas:</strong> {{ $medico->citas_count }}</p>
    </article>

    <h2>Próximas citas programadas</h2>

    @if ($proximasCitas->isEmpty())
        <article>
            Este profesional no tiene citas programadas próximamente.
        </article>
    @else
        <table>
            <thead>
                <tr>
                    <th>Fecha y hora</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proximasCitas as $cita)
                    <tr>
                        <td>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</td>
                        <td>{{ $cita->paciente->apellidos }}, {{ $cita->paciente->nombres }}</td>
                        <td>{{ $cita->motivo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection