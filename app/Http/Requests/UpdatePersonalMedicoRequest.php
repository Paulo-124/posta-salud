<?php

namespace App\Http\Requests;

use App\Models\PersonalMedico;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonalMedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'dni'         => trim((string) $this->input('dni')),
            'colegiatura' => trim((string) $this->input('colegiatura')),
            'nombres'     => trim((string) $this->input('nombres')),
            'apellidos'   => trim((string) $this->input('apellidos')),
        ]);
    }

    public function rules(): array
    {
        $medico = $this->route('personalMedico');

        return [
            'dni'          => ['required', 'digits:8', Rule::unique('personal_medico', 'dni')->ignore($medico)],
            'nombres'      => ['required', 'string', 'max:100'],
            'apellidos'    => ['required', 'string', 'max:100'],
            'especialidad' => ['required', 'string', Rule::in(PersonalMedico::ESPECIALIDADES)],
            'colegiatura'  => ['required', 'string', 'max:20', Rule::unique('personal_medico', 'colegiatura')->ignore($medico)],
        ];
    }

    public function messages(): array
    {
        return [
            'dni.digits'         => 'El DNI debe tener exactamente 8 dígitos numéricos.',
            'dni.unique'         => 'Ya existe otro profesional registrado con ese DNI.',
            'colegiatura.unique' => 'Ese número de colegiatura ya pertenece a otro profesional.',
            'especialidad.in'    => 'Seleccione una especialidad válida de la lista.',
        ];
    }
}