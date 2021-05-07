<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollaboratorUpdateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'phone' => 'required|size:9',
            'bi' => "required|size:14",
            'email' => "required|email",
            'gender' => 'required',
            'photo' => 'mimes:png,jpg,jpeg',
            'birthday' => 'required',
            'neighbourhood' => 'required',
            'street' => 'required',
            'municipe' => 'required',
            'description' => 'required',
            'province' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'birthday.required' => 'Campo data de nascimento é de preenchimento obrigatório ',
            'street.required' => 'Campo rua é de preenchimento obrigatório ',
            'neighbourhood.required' => 'Campo bairro é de preenchimento obrigatório ',
            'municipe.required' => 'Campo município é de preenchimento obrigatório ',
            'province.required' => 'Campo província é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'email.required' => 'Campo email é de preenchimento obrigatório ',
            'phone.required' => 'Campo nº telefone é de preenchimento obrigatório ',
            'bi.required' => 'Campo nº bi é de preenchimento obrigatório ',
            'description.required' => 'Campo descrição é de preenchimento obrigatório ',
            'gender.required' => 'Campo gênero é de preenchimento obrigatório ',
            'name.min' => 'Campo nome deve ter mais de 2 caracteres ',
            'phone.size' => 'Campo nº telefone deve ter 9 caracteres ',
            'bi.size' => 'Campo nº bi deve ter 14 caracteres ',
            'photo.mimes' => 'Carrega uma foto válida (.png, .jpg, .jpeg) ',
            
        ];
    }
}
