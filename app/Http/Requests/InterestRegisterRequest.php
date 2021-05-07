<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestRegisterRequest extends FormRequest
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
            'nameInterest' => 'required|min:3',
            'phoneInterest' => 'required',
            'descriptionInterest' => 'required',
            'emailInterest' => "required|email",
        ];
    }
    public function messages()
    {
        return [
            'nameInterest.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'phoneInterest.required' => 'Campo telefone é de preenchimento obrigatório ',
            'descriptionInterest.required' => 'Campo assunto é de preenchimento obrigatório ',
            'emailInterest.email' => 'Campo email deve receber um email válido ',
            'emailInterest.required' => 'Campo email é de preenchimento obrigatório ',
            'nameInterest.min' => 'Campo nome completo deve ter mais de 2 caracteres ',
        ];
    }
}
