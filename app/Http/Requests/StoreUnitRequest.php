<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id_company',
            'unit_name' => 'required|string|max:100',
            'unit_email' => 'nullable|email|max:100',
            'unit_phone' => 'nullable|string|max:20',
            'unit_address' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.required' => 'A empresa é obrigatória.',
            'company_id.exists' => 'A empresa selecionada não existe.',

            'unit_name.required' => 'O nome da agência é obrigatório.',
            'unit_name.max' => 'O nome da agência não pode ter mais que 100 caracteres.',

            'unit_email.email' => 'O email da agência deve ser um endereço válido.',
            'unit_email.max' => 'O email da agência não pode ter mais que 100 caracteres.',

            'unit_phone.max' => 'O telefone da agência não pode ter mais que 20 caracteres.',

            'unit_address.max' => 'O endereço da agência não pode ter mais que 255 caracteres.',
        ];
    }
}
