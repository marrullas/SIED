<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtencionRequest extends FormRequest
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
            'cantidad' => 'required|integer',
            'descripcion' => 'nullable|string|max:255',
            'familia_id' => 'required|integer',
            'evento_id' => 'required|integer',
            'tipo_ayuda_id' => 'required|integer',
            'fecha_hora_atencion' => 'required|date',
            'foto1' => 'nullable|string|max:255',
            'foto2' => 'nullable|string|max:255',
        ];
    }
}
