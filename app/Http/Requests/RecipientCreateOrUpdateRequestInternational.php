<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipientCreateOrUpdateRequestInternational extends FormRequest
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
            'sender.name'=>'required',
            'sender.business_name'=>'required',
            'sender.email'=>'required|email',
            'sender.phone'=>'required',
            'sender.address'=>'required',
            'sender.city'=>'required',
            'sender.state'=>'required',
            'sender.country_id'=>'required',
            'sender.postcode'=>'required',
            'sender.is_international'=>'required|boolean',
            'receiver.name'=>'required',
            'receiver.business_name'=>'required',
            'receiver.email'=>'required|email',
            'receiver.phone'=>'required',
            'receiver.address'=>'required',
            'receiver.city'=>'required',
            'receiver.state'=>'required',
            'receiver.country_id'=>'required',
            'receiver.postcode'=>'required',
            'receiver.is_international'=>'required|boolean',
        ];
    }

    public function messages(){

        return [

            'sender.name.required'=>'El campo nombre del remitente es requerido',
            'sender.business_name.required'=>'El campo compañia del remitente es requerido',
            'sender.email.required'=>'El campo email del remitente es requerido',
            'sender.email.email'=>'El campo email del remitente es invalido',
            'sender.phone.required'=>'El campo teléfono del remitente es requerido',
            'sender.address.required'=>'El campo dirección del remitente es requerido',
            'sender.city.required'=>'El campo ciudad del remitente es requerido',
            'sender.state.required'=>'El campo estado del remitente es requerido',
            'sender.country_id.required'=>'El campo país del remitente es requerido',
            'sender.postcode.required'=>'El campo código postal del remitente es requerido',
            'sender.is_international.required'=>'Se requiere se indique el campo is_international',
            'sender.is_international.boolean'=>'El campo  is_international debe ser de tipo boolean',
            'receiver.name.required'=>'El campo nombre del receptor es requerido',
            'receiver.business_name.required'=>'El campo compañia del receptor es requerido',
            'receiver.email.required'=>'El campo email del receptor es requerido',
            'receiver.email.email'=>'El campo email del receptor es invalido',
            'receiver.phone.required'=>'El campo teléfono del receptor es requerido',
            'receiver.address.required'=>'El campo dirección del receptor es requerido',
            'receiver.city.required'=>'El campo ciudad del receptor es requerido',
            'receiver.state.required'=>'El campo estado del receptor es requerido',
            'receiver.country_id.required'=>'El campo país del receptor es requerido',
            'receiver.postcode.required'=>'El campo código postal del receptor es requerido',            
            'receiver.is_international.required'=>'Se requiere se indique el campo is_international',
            'receiver.is_international.boolean'=>'El campo  is_international debe ser de tipo boolean'
        ];
    }

}
