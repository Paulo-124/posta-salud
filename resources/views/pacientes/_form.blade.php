<div>
    <label for="dni">DNI</label>
    <input type="text" id="dni" name="dni"
        value="{{ old('dni', $paciente->dni) }}">
    @error('dni')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="nombres">Nombres</label>
    <input type="text" id="nombres" name="nombres"
        value="{{ old('nombres', $paciente->nombres) }}">
    @error('nombres')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="apellidos">Apellidos</label>
    <input type="text" id="apellidos" name="apellidos"
        value="{{ old('apellidos', $paciente->apellidos) }}">
    @error('apellidos')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="fecha_nacimiento">Fecha de nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
        value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento?->format('Y-m-d')) }}">
    @error('fecha_nacimiento')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo">
        <option value="">Seleccione</option>
        <option value="M" @selected(old('sexo', $paciente->sexo) === 'M')>Masculino</option>
        <option value="F" @selected(old('sexo', $paciente->sexo) === 'F')>Femenino</option>
    </select>
    @error('sexo')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="telefono">Celular</label>
    <input type="text" id="telefono" name="telefono"
        value="{{ old('telefono', $paciente->telefono) }}">
    @error('telefono')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" name="direccion"
        value="{{ old('direccion', $paciente->direccion) }}">
    @error('direccion')
        <small class="aviso-error">{{ $message }}</small>
    @enderror
</div>