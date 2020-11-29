<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierStoreRequest extends FormRequest
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
            "name" => "required|unique:couriers",
            "image" =>"required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nombre es requerido",
            "name.unique" => "Nombre ya existe",
            "image.required" =>"Imagen es requerida"
        ];
    }



}
