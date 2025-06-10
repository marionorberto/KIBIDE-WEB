<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ajuste conforme política de acesso
    }

    public function rules(): array
    {
        return [
            'sender_id' => 'required|exists:users,id_user',
            'receiver_id' => 'required|exists:users,id_user',
            'subject' => 'required|string|min:10|max:100',
            'content' => 'required|string|min:15|max:300',
            'is_read' => 'nullable|boolean',
            'unit_id' => 'required|string', // ou exists:units,id se for id
        ];
    }

    public function messages(): array
    {
        return [
            'sender_id.required' => 'O remetente é obrigatório.',
            'sender_id.exists' => 'Remetente inválido.',

            'receiver_id.required' => 'O destinatário é obrigatório.',
            'receiver_id.exists' => 'Destinatário inválido.',

            'subject.required' => 'O assunto é obrigatório.',
            'subject.max' => 'O assunto não pode ter mais que 100 caracteres.',
            'subject.min' => 'O assunto não pode ter menos que 10 caracteres.',

            'content.required' => 'O conteúdo da mensagem é obrigatório.',
            'content.max' => 'A mensagem não pode ter mais que 300 caracteres.',
            'content.min' => 'A mensagem não pode ter menos que 15 caracteres.',

            'is_read.boolean' => 'O campo "lido" deve ser verdadeiro ou falso.',

            'unit_id.required' => 'A unidade é obrigatória.',
            'unit_id.string' => 'A unidade deve ser uma string válida.',
        ];
    }
}
