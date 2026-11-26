<div class="grid">
    <label>
        DNI
        <input type="text" name="dni" maxlength="8" inputmode="numeric"
            value="{{ old('dni', $medico->dni ?? '') }}"
            @aria-invalid($errors->has('dni') ? 'true' : null)>
        @error('dni')
            <small>{{ $message }}</small>
        @enderror
    </label>

    <label>
        Número de colegiatura
        <input type="text" name="colegiatura" maxlength="20"
            value="{{ old('colegiatura', $medico->colegiatura ?? '') }}"
            @aria-invalid($errors->has('colegiatura') ? 'true' : null)>
        @error('colegiatura')
            <small>{{ $message }}</small>
        @enderror
    </label>
</div>

<div class="grid">
    <label>
        Nombres
        <input type="text" name="nombres" maxlength="100"
            value="{{ old('nombres', $medico->nombres ?? '') }}"
            @aria-invalid($errors->has('nombres') ? 'true' : null)>
        @error('nombres')
            <small>{{ $message }}</small>
        @enderror
    </label>

    <label>
        Apellidos
        <input type="text" name="apellidos" maxlength="100"
            value="{{ old('apellidos', $medico->apellidos ?? '') }}"
            @aria-invalid($errors->has('apellidos') ? 'true' : null)>
        @error('apellidos')
            <small>{{ $message }}</small>
        @enderror
    </label>
</div>

<label>
    Especialidad
    <select name="especialidad" @aria-invalid($errors->has('especialidad') ? 'true' : null)>
        <option value="">Seleccione una especialidad...</option>
        @foreach ($especialidades as $esp)
            <option value="{{ $esp }}"
                @selected(old('especialidad', $medico->especialidad ?? '') === $esp)>
                {{ $esp }}
            </option>
        @endforeach
    </select>
    @error('especialidad')
        <small>{{ $message }}</small>
    @enderror
</label>