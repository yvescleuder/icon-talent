<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'address' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'ddd' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Este campo é obrigatório.',
        ];
    }
}
