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
            'cantidad' => 'nullable|integer',
            'descripcion' => 'nullable|string|max:255',
            'familia_id' => 'required|integer',
            'evento_id' => 'required|integer',
            'tipo_ayuda_id' => 'required|integer',
            'fecha_hora_atencion' => 'nullable|date_format:d/m/Y H:i',
            'responsable_atencion' => 'nullable|string|max:255',
            'entregado' => 'required|boolean',
            'foto1' => 'nullable',
            'foto2' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'entregado' => $this->toBoolean($this->entregado),
        ]);
    }


    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return boolean
     */
    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
