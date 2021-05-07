<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollaboratorRegisterRequest extends FormRequest
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
            'bi' => "required|size:14|unique:collaborators,bi",
            'email' => "required|email|unique:users,email",
            'password' => 'required|min:6',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'email.required' => 'Campo email é de preenchimento obrigatório ',
            'phone.required' => 'Campo nº telefone é de preenchimento obrigatório ',
            'bi.required' => 'Campo nº bi é de preenchimento obrigatório ',
            'password.required' => 'Campo senha é de preenchimento obrigatório ',
            'gender.required' => 'Campo gênero é de preenchimento obrigatório ',
            'email.unique' => 'Já existe usuário com este email ',
            'bi.unique' => 'Já existe colaborador com este nº bi ',
            'name.min' => 'Campo nome deve ter mais de 2 caracteres ',
            'phone.size' => 'Campo nº telefone deve ter 9 caracteres ',
            'bi.size' => 'Campo nº bi deve ter 14 caracteres ',
            'password.min' => 'Campo senha deve ter mais de 5 caracteres ',
        ];
    }
}
