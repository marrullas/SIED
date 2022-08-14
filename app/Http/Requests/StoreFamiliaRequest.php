<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamiliaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipo_documento_id' => 'required|integer',
            'documento' => 'required|string|max:255',
            'genero_id' => 'required|string|max:255',
            'edad' => 'required|integer',
            'tipo_poblacion_id' => 'required|integer',
            'estrato_id' => 'required|integer',
            'etnia_id' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ocupacion' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
            'email' => 'nullable|string|max:255',
            'evento_id' => 'required|integer',
        ];
    }
}
