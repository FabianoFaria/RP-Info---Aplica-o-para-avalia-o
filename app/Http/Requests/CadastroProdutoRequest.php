<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'valor' => ['required', 'numeric', 'between:0,99999999.99'],
            'categoria_id' => 'required|exists:categoria,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome do produto é obrigatório.',
            'nome.string' => 'O campo nome do produto deve ser uma string.',
            'nome.max'  => 'O campo nome do produto não pode ter mais que 255 caracteres.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric'  => 'O campo valor deve ser um número.',
            'valor.between' => 'O valor do produto deve estar entre 0 e 99.999.999,99.',
            'categoria_id.required' => 'O campo categoria é obrigatório.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',
        ];
    }
}
