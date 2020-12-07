<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class gesstor extends FormRequest
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
            //
        'fecha inicio'=> 'required',
        'fecha final'=> 'required',
        'administracion poductos'=> 'required',
        'administracion categorias'=> 'required',
        ];
    }
}