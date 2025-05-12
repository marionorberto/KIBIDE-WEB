<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreChangePasswordRequest extends FormRequest
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
            'actual_password' => 'required|string|current_password|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'actual_password.required' => 'A Password Actual  é obrigatória.',
            'actual_password.min' => 'A Password Actual deve ter pelo menos 8 caracteres.',
            'actual_password' => 'Password Atual incorecta',

            'password.required' => 'A Nova Password é obrigatória.',
            'password.confirmed' => 'As Passwords não coincidem.',
            'password.min' => 'A Nova Password deve ter no mínimo :min caracteres.',
            'password.mixed' => 'A Nova Password deve conter letras maiúsculas e minúsculas.',
            'password.letters' => 'A Nova Password deve conter pelo menos uma letra.',
            'password.numbers' => 'A Nova Password deve conter pelo menos um número.',
            'password.symbols' => 'A Nova Password deve conter pelo menos um símbolo (ex: @, #, !).',
            'password.uncompromised' => 'Esta Nova Password já foi exposta em um vazamento de dados. Por favor, escolha outra.',
        ];
    }

}



