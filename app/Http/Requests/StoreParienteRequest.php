<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParienteRequest extends FormRequest
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
            'edad' => 'required|integer',
            'telefono' => 'nullable|string|max:255',
            'tipo_poblacion_id' => 'required|integer',
            'genero_id' => 'required|integer',
            'parentesco_id' => 'required|integer',
            'evento_id' => 'required|integer',
            'notas' => 'nullable|string|max:255',
            'familia_id' => 'required|integer',
        
        ];
    }
}
