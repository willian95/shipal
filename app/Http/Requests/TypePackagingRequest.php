<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypePackagingRequest extends FormRequest
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

            "typesPackaging.name" => "required",
            "typesPackaging.length" => "required",
            "typesPackaging.width" => "required",
            "typesPackaging.height" => "required",
        ]; 



    }

    public function messages(){

        return [
            
            "typesPackaging.name.required" => "El campo nombre es requerido",
            "typesPackaging.length.required" => "El campo longitud es requerido",
            "typesPackaging.width.required" => "El campo ancho es requerido",
            "typesPackaging.height.required" => "El campo altura es requerido",

        ];

    }

}
