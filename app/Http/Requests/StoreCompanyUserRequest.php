<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreCompanyUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            // Campos da empresa
            'company_name' => 'required|string|max:255|unique:companies',
            'company_email' => 'required|string|email|unique:companies',
            'company_phone' => 'nullable|string|max:20',
            'company_nif' => 'required|string|max:30|unique:companies',
            'company_address' => 'nullable|string|max:255',

            // Campos do usuário
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|in:superadmin,admin,manager,desk,guest',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ];
    }

    public function messages(): array
    {

        return [
            // Empresa
            'company_name.required' => 'O nome da empresa é obrigatório.',
            'company_name.unique' => 'Já existe uma empresa com esse nome.',
            'company_email.required' => 'O e-mail da empresa é obrigatório.',
            'company_email.unique' => 'Este e-mail da empresa já está em uso.',
            'company_nif.required' => 'O NIF da empresa é obrigatório.',
            'company_nif.unique' => 'Este NIF já está em uso.',

            // Usuário
            'username.required' => 'O nome de usuário é obrigatório.',
            'username.unique' => 'Este nome de usuário já está em uso.',
            'email.required' => 'O e-mail do usuário é obrigatório.',
            'email.email' => 'O e-mail do usuário é inválido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'As senhas não coincidem.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.mixed' => 'A senha deve conter letras maiúsculas e minúsculas.',
            'password.letters' => 'A senha deve conter pelo menos uma letra.',
            'password.numbers' => 'A senha deve conter pelo menos um número.',
            'password.symbols' => 'A senha deve conter pelo menos um símbolo (ex: @, #, !).',
            'password.uncompromised' => 'Esta senha já foi exposta em um vazamento de dados. Por favor, escolha outra.',
            'role.required' => 'O tipo de usuário é obrigatório.',
            'role.in' => 'O tipo de usuário selecionado é inválido.',
        ];
    }
}