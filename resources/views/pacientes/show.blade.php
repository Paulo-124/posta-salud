
@extends('layouts.app')

@section('titulo', 'Ficha del paciente')

@section('contenido')
    <h1>Ficha del paciente</h1>

    @if (session('ok'))
        <p class="mensaje-exito">{{ session('ok') }}</p>
    @endif

    @if (session('error'))
        <p class="mensaje-error">{{ session('error') }}</p>
    @endif

    <div class="ficha-paciente">
        <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
        <p><strong>Nombres:</strong> {{ $paciente->nombres }}</p>
        <p><strong>Apellidos:</strong> {{ $paciente->apellidos }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ $paciente->fecha_nacimiento?->format('d/m/Y') }}</p>
        <p><strong>Sexo:</strong> {{ $paciente->sexo === 'M' ? 'Masculino' : 'Femenino' }}</p>
        <p><strong>Celular:</strong> {{ $paciente->telefono }}</p>
        <p><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
    </div>

    <div class="acciones">
        <a href="{{ route('pacientes.edit', $paciente) }}">Editar paciente</a>

        <form method="POST" action="{{ route('pacientes.destroy', $paciente) }}"
              onsubmit="return confirm('¿Eliminar a este paciente?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="secondary">Eliminar</button>
        </form>

        <a href="{{ route('pacientes.index') }}">Volver al listado</a>
    </div>
@endsection
