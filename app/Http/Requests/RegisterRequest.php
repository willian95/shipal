<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => "required|min:2",
            "email" => "required|email|unique:users",
            "lastname" => "required|min:2",
            "password" => "required|min:6",
            "business_name" => "required",
            "business_website" => "required",
        ]; 
    }

    public function messages(){

        return [
            "name.required" => "Nombre es requerido",
            "name.min" => "Se necesitan al menos 2 caracteres para el nombre",
            "email.required" => "Email es requerido",
            "email.email" => "Email ingresado no es válido",
            "email.unique" => "Este email se encuentra registrado",
            "lastname.required" => "Apellido es requerido",
            "lastname.min" => "Se necesitan al menos 2 caracteres para el apellido",
            "business_name.required" => "Nombre comercial es requerido",
            "password.required" => "Constraseña es requerida",
            "password.min" => "Contraseña debe tener al menos 6 caracteres"
        ];

    }
}
