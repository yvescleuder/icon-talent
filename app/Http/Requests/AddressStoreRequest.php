<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'cep' => 'required|digits:8|unique:addresses,cep'
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'O CEP é obrigatório.',
            'digits'       => 'O CEP precisa ter 8 dígitos.',
            'unique'       => 'O CEP ja está cadastrado.'
        ];
    }
}
