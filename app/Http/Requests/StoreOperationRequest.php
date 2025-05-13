<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => 'required|uuid|exists:services,id_service',
            'counter_id' => 'required|uuid|exists:counters,id_counter',
            'name' => 'nullable|string|max:255',
            'realization_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'O campo serviço é obrigatório.',
            'service_id.uuid' => 'O ID do serviço deve ser um UUID válido.',
            'service_id.exists' => 'O serviço selecionado não existe.',

            'counter_id.required' => 'O campo guiché é obrigatório.',
            'counter_id.uuid' => 'O ID do guiché deve ser um UUID válido.',
            'counter_id.exists' => 'O guiché selecionado não existe.',

            // 'unit_id.required' => 'O campo unidade é obrigatório.',
            // 'unit_id.uuid' => 'O ID da unidade deve ser um UUID válido.',
            // 'unit_id.exists' => 'A unidade selecionada não existe.',

            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'realization_date.required' => 'A data de realização é obrigatória.',
            'realization_date.date' => 'A data de realização deve ser uma data válida.',

        ];
    }
}



