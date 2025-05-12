<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => 'required|uuid|exists:companies,id_company',
            'sector_industry' => 'nullable|string|max:255',
            'number_of_employees' => 'nullable|integer|min:1',
            'founded_at' => 'nullable|date|before_or_equal:today',
            'website_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'about' => 'nullable|string|max:355',
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.required' => 'A empresa vinculada é obrigatória.',
            'company_id.uuid' => 'O ID da empresa deve ser um UUID válido.',
            'company_id.exists' => 'A empresa informada não foi encontrada.',

            'sector_industry.string' => 'O setor deve ser um texto válido.',
            'sector_industry.max' => 'O setor deve ter no máximo 255 caracteres.',

            'number_of_employees.integer' => 'O número de funcionários deve ser um número inteiro.',
            'number_of_employees.min' => 'O número de funcionários deve ser no mínimo 1.',

            'founded_at.date' => 'A data de fundação deve ser uma data válida.',
            'founded_at.before_or_equal' => 'A data de fundação não pode estar no futuro.',

            'website_url.url' => 'O site deve ser uma URL válida.',
            'facebook_url.url' => 'O link do Facebook deve ser uma URL válida.',
            'instagram_url.url' => 'O link do Instagram deve ser uma URL válida.',
            'about.max' => 'Sobre a descrição da empresa precisa ter no máximo 255 caracter',
        ];
    }
}
