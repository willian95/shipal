<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipientsNotebookRequest extends FormRequest
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
            'recipient.name'=>'required',
            'recipient.business_name'=>'required',
            'recipient.email'=>'required|email',
            'recipient.phone'=>'required',
            'recipient.address'=>'required',
            'recipient.city'=>'required',
            'recipient.state'=>'required',
            'recipient.country_id'=>'required',
            'recipient.postcode'=>'required',
            'recipient.is_international'=>'required|boolean',
        ];
    }

    public function messages(){

        return [

            'recipient.name.required'=>'El campo nombre  es requerido',
            'recipient.business_name.required'=>'El campo compañia  es requerido',
            'recipient.email.required'=>'El campo email  es requerido',
            'recipient.email.email'=>'El campo email  es invalido',
            'recipient.phone.required'=>'El campo teléfono  es requerido',
            'recipient.address.required'=>'El campo dirección  es requerido',
            'recipient.city.required'=>'El campo ciudad  es requerido',
            'recipient.state.required'=>'El campo estado  es requerido',
            'recipient.country_id.required'=>'El campo país  es requerido',
            'recipient.postcode.required'=>'El campo código postal  es requerido',            
            'recipient.is_international.required'=>'Se requiere se indique el campo is_international',
            'recipient.is_international.boolean'=>'El campo  is_international debe ser de tipo boolean'
        ];
    }

}
