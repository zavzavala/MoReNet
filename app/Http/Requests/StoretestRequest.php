<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoretestRequest extends FormRequest
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
      
        'cliente'=>['required'],
        'telefone'=>['required'],
        'endereco'=>['required'],
        'email'=>['required'],
        'localizacao'=>['required'],
        'data_contrato'=>['required'],
        'descricao'=>['required'],
        'tipo_empresa'=>['required', Rule::In('P', 'Pr','EP','Epr', 'p', 'pr', 'M')],//[empresa publica, empresa privada, ensino publico, ensino privado, ministerio]
        //'Empresa'=>['required', Rule::In('E', 'e')],
        //'ministerio'=>['required', Rule::In('M', 'm')],
        'url'=>['required'],
        //'informacao'=>['required'],
      
        ];
    }


}
