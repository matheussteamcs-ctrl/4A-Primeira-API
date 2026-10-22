<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $obrigatorio = $this->isMethod('post')
            ? 'required'
            : 'sometimes';

        return [
            'titulo' => [$obrigatorio, 'string', 'max:255'],
            'autor' => [$obrigatorio, 'string', 'max:255'],
            'ano' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:2100'],
            'disponivel' => ['sometimes', 'boolean'],
        ];
    }
}
