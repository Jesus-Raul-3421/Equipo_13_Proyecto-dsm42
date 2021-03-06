<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class detalle_factura extends FormRequest
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
        'numero detalle'=> 'required',
        'numero de factura'=> 'required',
        'id producto'=> 'required',
        'cantidad'=> 'required',

        ];
    }
}