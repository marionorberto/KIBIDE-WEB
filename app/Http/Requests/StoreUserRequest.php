<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir todos os usuários ou ajustar conforme necessário
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
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
            'active' => 'required|boolean',
            'photo' => 'nullable',
            'unit_id' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'O nome de usuário é obrigatório.',
            'username.max' => 'O nome de usuário não pode ter mais que 50 caracteres.',
            'username.unique' => 'Este nome de usuário já está em uso.',

            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço válido.',
            'email.max' => 'O email não pode ter mais que 100 caracteres.',
            'email.unique' => 'Este email já está em uso.',

            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'As senhas não coincidem.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.mixed' => 'A senha deve conter letras maiúsculas e minúsculas.',
            'password.letters' => 'A senha deve conter pelo menos uma letra.',
            'password.numbers' => 'A senha deve conter pelo menos um número.',
            'password.symbols' => 'A senha deve conter pelo menos um símbolo (ex: @, #, !).',
            'password.uncompromised' => 'Esta senha já foi exposta em um vazamento de dados. Por favor, escolha outra.',

            'active.required' => 'O campo ativo é obrigatório.',
            'active.boolean' => 'O campo ativo deve ser verdadeiro ou falso.',

            'unit_id' => 'Nome da Unidade Desconhecido'
        ];
    }
}
