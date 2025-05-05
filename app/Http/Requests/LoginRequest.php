<?php

// app/Http/Requests/LoginRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'O campo username é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
        ];
    }
}
