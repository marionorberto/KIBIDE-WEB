<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'password' => 'required|string|min:8|confirmed',
            'actual_password' => 'required|string|current_password|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'A Nova Password é obrigatória.',
            'password.confirmed' => 'As Nova Password e Confirmar Password não coincidem.',
            'password.min' => 'A Nova Password deve ter pelo menos 8 caracteres.',
            'actual_password.required' => 'A Password Actual  é obrigatória.',
            'actual_password.min' => 'A Password Actual deve ter pelo menos 8 caracteres.',
            'actual_password' => 'Password Atual incorecta'
        ];
    }

}



