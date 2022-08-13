<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoCierreRequest  extends FormRequest
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
            'fecha_hora_cierre' => 'required|date_format:d/m/Y H:i',
            'descripcion_cierre' => 'required',
            'estado_evento_id' => 'required',
            'atendido' => 'boolean',
            'evento_id' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'atendido' => $this->toBoolean($this->atendido),
        ]);
    }

    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
