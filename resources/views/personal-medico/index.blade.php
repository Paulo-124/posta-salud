@extends('layouts.app')

@section('titulo', 'Personal médico')

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Personal médico</h1>
        <a href="{{ route('personal-medico.create') }}" role="button">Registrar personal</a>
    </div>

    <form method="GET" action="{{ route('personal-medico.index') }}">
        <div class="grid">
            <input type="search" name="buscar" value="{{ $buscar }}"
                placeholder="Buscar por apellidos, DNI o colegiatura">

            <select name="especialidad">
                <option value="">Todas las especialidades</option>
                @foreach (\App\Models\PersonalMedico::ESPECIALIDADES as $esp)
                    <option value="{{ $esp }}" @selected($especialidad === $esp)>
                        {{ $esp }}
                    </option>
                @endforeach
            </select>

            <select name="estado">
                <option value="activos"   @selected($estado === 'activos')>Solo activos</option>
                <option value="inactivos" @selected($estado === 'inactivos')>Solo inactivos</option>
                <option value="todos"     @selected($estado === 'todos')>Todos</option>
            </select>

            <button type="submit">Filtrar</button>
        </div>

        @if ($buscar || $especialidad || $estado !== 'activos')
            <p><a href="{{ route('personal-medico.index') }}">Limpiar filtros</a></p>
        @endif
    </form>

    @if ($personal->isEmpty())
        <article>
            No se encontró personal médico con los filtros seleccionados.
        </article>
    @else
        <table>
            <thead>
                <tr>
                    <th>Colegiatura</th>
                    <th>Apellidos y nombres</th>
                    <th>Especialidad</th>
                    <th>DNI</th>
                    <th>Citas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personal as $medico)
                    <tr>
                        <td>{{ $medico->colegiatura }}</td>
                        <td>{{ $medico->apellidos }}, {{ $medico->nombres }}</td>
                        <td>{{ $medico->especialidad }}</td>
                        <td>{{ $medico->dni }}</td>
                        <td>{{ $medico->citas_count }}</td>
                        <td><x-estado :activo="$medico->activo" /></td>
                        <td class="acciones">
                            <a href="{{ route('personal-medico.show', $medico) }}">Ver</a>
                            <a href="{{ route('personal-medico.edit', $medico) }}">Editar</a>

                            <form method="POST" action="{{ route('personal-medico.estado', $medico) }}" style="margin: 0;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="outline {{ $medico->activo ? 'contrast' : '' }}"
                                    style="padding: 0.25rem 0.6rem; font-size: 0.85rem;">
                                    {{ $medico->activo ? 'Desactivar' : 'Reactivar' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $personal->links() }}
    @endif
@endsection