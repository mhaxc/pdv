<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'produto_id'=>'required',
            'quantidade' => 'required',
            'preco' => 'required'

        ];
    }



    public function messages()
     {
         return[
             'preco.regex' => 'Inserir . (ponto) em vez de , (vírgula) no preço.'
         ];
     }

}
