@extends('layouts.app')

@section('titulo', 'Editar personal médico')

@section('contenido')
    <h1>Editar personal médico</h1>

    <form method="POST" action="{{ route('personal-medico.update', $medico) }}">
        @csrf
        @method('PUT')

        @include('personal-medico._form')

        <div class="acciones">
            <button type="submit">Guardar cambios</button>
            <a href="{{ route('personal-medico.show', $medico) }}" role="button" class="secondary">Cancelar</a>
        </div>
    </form>
@endsection