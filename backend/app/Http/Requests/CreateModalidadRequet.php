<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateModalidadRequet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombreModalidad' => 'required|unique:modalidads'
        ];
    }

    public function messages(){
        return [
            'nombreModalidad.unique' => 'La modalidad ya ha sido registrado'
        ];
    }
}
