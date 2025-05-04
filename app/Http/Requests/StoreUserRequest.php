<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        dd('ess');
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:40|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:mentor,student,admin',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'O primeiro nome é obrigatório.',
            'lastname.required' => 'O sobrenome é obrigatório.',
            'username.required' => 'O nome de usuário é obrigatório.',
            'username.unique' => 'Este nome de usuário já está em uso.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Insira um email válido.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As passwords não coicidem!',
            'role.required' => 'O papel do usuário é obrigatório.',
            'role.in' => 'O papel deve ser mentor, student ou admin.',
        ];
    }
}
