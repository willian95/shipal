<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageInformationRequest extends FormRequest
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

            "typesPackaging.length" => "required",
            "typesPackaging.width" => "required",
            "typesPackaging.height" => "required",
            "typesPackaging.weight" => "required",
            "packageInformation.declaredValue" => "required",
            "packageInformation.shippingDate" => "required",
            "packageInformation.secureYourPackage" => "required",
        ]; 



    }

    public function messages(){

        return [

            "typesPackaging.length.required" => "El campo longitud es requerido",
            "typesPackaging.width.required" => "El campo ancho es requerido",
            "typesPackaging.height.required" => "El campo altura es requerido",
            "typesPackaging.weight.required" => "El campo peso es requerido",
            "packageInformation.declaredValue.required" => "El campo valor declarado es requerido",
            "packageInformation.shippingDate.required" => "El campo fecha de envio es requerido",
            "packageInformation.secureYourPackage.required" => "El campo asegura tu paquete es requerido",

        ];

    }

}
