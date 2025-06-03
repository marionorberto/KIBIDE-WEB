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
            'company_nif' => [
                'required',
                'regex:/^\d+$/',
                'max:30',
                'unique:companies,company_nif',
            ],
            'company_address' => 'nullable|string|max:255',

            // Profile da Company
            'photo' => 'nullable|max:2048',
            'site_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',

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

            'company_nif.required' => 'O NIF é obrigatório.',
            'company_nif.regex' => 'O NIF deve conter apenas números.',
            'company_nif.max' => 'O NIF não pode ter mais que 30 dígitos.',
            'company_nif.unique' => 'Este NIF já está cadastrado.',

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

            // Profile da Company
            // 'photo.image' => 'A foto deve ser um arquivo de imagem válido.',
            'photo.max' => 'A foto não pode ter mais que 2MB.',
            'site_url.url' => 'O site deve ser uma URL válida.',
            'site_url.max' => 'A URL do site não pode ter mais que 255 caracteres.',
            'facebook_url.url' => 'O link do Facebook deve ser uma URL válida.',
            'facebook_url.max' => 'A URL do Facebook não pode ter mais que 255 caracteres.',
            'instagram_url.url' => 'O link do Instagram deve ser uma URL válida.',
            'instagram_url.max' => 'A URL do Instagram não pode ter mais que 255 caracteres.',
            'linkedin_url.url' => 'O link do LinkedIn deve ser uma URL válida.',
            'linkedin_url.max' => 'A URL do LinkedIn não pode ter mais que 255 caracteres.',
        ];
    }
}
