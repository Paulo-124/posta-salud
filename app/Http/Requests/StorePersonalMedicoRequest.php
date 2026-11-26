<?php

namespace App\Http\Requests;

use App\Models\PersonalMedico;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePersonalMedicoRequest extends FormRequest
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
        return [
            'dni'          => ['required', 'digits:8', 'unique:personal_medico,dni'],
            'nombres'      => ['required', 'string', 'max:100'],
            'apellidos'    => ['required', 'string', 'max:100'],
            'especialidad' => ['required', 'string', Rule::in(PersonalMedico::ESPECIALIDADES)],
            'colegiatura'  => ['required', 'string', 'max:20', 'unique:personal_medico,colegiatura'],
        ];
    }

    public function messages(): array
    {
        return [
            'dni.digits'         => 'El DNI debe tener exactamente 8 dígitos numéricos.',
            'dni.unique'         => 'Ya existe un profesional registrado con ese DNI.',
            'colegiatura.unique' => 'Ese número de colegiatura ya está registrado.',
            'especialidad.in'    => 'Seleccione una especialidad válida de la lista.',
        ];
    }
}