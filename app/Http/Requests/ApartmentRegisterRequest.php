<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRegisterRequest extends FormRequest
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
            'block' => 'required',
            'build' => 'required',
            'entrance' => 'required',
            'flat' => 'required',
            'topology' => 'required',
            'business' => 'required',
            'condiction' => 'required',
            'price' => 'required',
            'negociable' => 'required',
            'available' => 'required',
            'photo' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'block.required' => 'Campo bloco é de preenchimento obrigatório ',
            'build.required' => 'Campo prédio é de preenchimento obrigatório ',
            'entrance.required' => 'Campo entrada é de preenchimento obrigatório ',
            'flat.required' => 'Campo andar é de preenchimento obrigatório ',
            'topology.required' => 'Campo topologia é de preenchimento obrigatório ',
            'business.required' => 'Campo tipo de négocio é de preenchimento obrigatório ',
            'condiction.required' => 'Campo condição é de preenchimento obrigatório ',
            'price.required' => 'Campo preço é de preenchimento obrigatório ',
            'negociable.required' => 'Campo condição do preço é de preenchimento obrigatório ',
            'available.required' => 'Campo disponibilidade de mudança é de preenchimento obrigatório ',
            'photo.required' => 'Campo foto 1 e foto 2 é de preenchimento obrigatório ',
        ];
    }
}
