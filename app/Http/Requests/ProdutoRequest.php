<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome'=> 'required',
            'preco' => 'required',
            'estoque' => 'required',
            'descricao' => 'required',
            'volume' => 'required|integer',
            'imagem' => 'nullable|image',
            'categoria_id' => 'required'


        ];
    }
}
