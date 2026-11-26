@extends('layouts.app')

@section('titulo', 'Registrar personal médico')

@section('contenido')
    <h1>Registrar personal médico</h1>

    <form method="POST" action="{{ route('personal-medico.store') }}">
        @csrf

        @include('personal-medico._form')

        <div class="acciones">
            <button type="submit">Guardar profesional</button>
            <a href="{{ route('personal-medico.index') }}" role="button" class="secondary">Cancelar</a>
        </div>
    </form>
@endsection