<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventoRequest extends FormRequest
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
            'fecha_hora_reporte' => 'required|date_format:d/m/Y H:i',
            'fecha_hora_verificacion' => 'nullable|date_format:d/m/Y H:i',
            'fecha_hora_evento' => 'nullable|date_format:d/m/Y H:i',
            'responsable_reporte' => 'required',
            'descripcion' => 'required',
            'tipo_evento_id' => 'required',
            'estado_evento_id' => 'required',
            'zona_id' => 'required',
            'entidad_id' => 'required',
            'numero_afectados' => 'nullable|numeric',
        ];
    }
}
