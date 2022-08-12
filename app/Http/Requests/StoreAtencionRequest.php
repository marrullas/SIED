<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtencionRequest extends FormRequest
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
            'responsable_atencion' => 'required|string|max:255',
            'foto1' => 'nullable',
            'foto2' => 'nullable',
            //
        ];
    }
}
