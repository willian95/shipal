<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypePackageStoreRequest extends FormRequest
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
            "file" => "required",
            "courierId" => "required"
        ];
    }

    public function message()
    {
        return [
            "file.requried" => "Archivo es requerido",
            "courierId.required" => "Debe seleccionar un courier"
        ];
    }
}
