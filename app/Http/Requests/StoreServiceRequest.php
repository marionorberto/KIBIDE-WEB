<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'description' => 'required|string|max:50',
            'priority_level' => 'required|string|max:50|in:normal,urgent',
            'prefix_code' => 'required|string|max:3',
            'active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'O nome de usuário é obrigatório.',
            'description.max' => 'O nome de usuário não pode ter mais que 50 caracteres.',

            'prefix_code.required' => 'O prefixo é o obrigatório',
            'prefix_code.max' => 'Prefixo apenas pode ter no máximo 3 caracteres',

            'priority_level.required' => 'O nivel de prioridade é obrigatório.',
            'priority_level.max' => 'O nivel de prioridade  não pode ter mais que 50 caracteres.',
            'priority_level.in' => 'O nivel de prioridade de ser normal ou urgente.',

            'active.required' => 'O campo ativo é obrigatório.',
            'active.boolean' => 'O campo ativo deve ser verdadeiro ou falso.',
        ];
    }
}
