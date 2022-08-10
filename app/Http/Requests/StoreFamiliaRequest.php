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
            'numero_miembros' => 'required|integer',
            'mayores65' => 'nullable|integer',
            'mayores18' => 'nullable|integer',
            'menores18' => 'nullable|integer',
            'evento_id' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
        
        ];
    }
}
