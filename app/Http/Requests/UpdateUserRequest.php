<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //basic info
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'password' => ['min:8', 'confirmed'],

            //advanced info
            'address' => ['required'],
            'apartment' => ['nullable'],

            //'mobile' => ['required', 'numeric', 'digits:8'],
            'mobile' => ['numeric', 'required'],
            
            'money_per_hour' => ['numeric'],

            'username' => ['required', 'max:20'],


        ];
    }

    public function messages()
    {
        return[
            //basic info
            'first_name.required' => 'Jméno je požadosváno',
            'first_name.alpha' => 'Jméno musí obsahovat pouze pismena',

            'last_name.required' => 'Příjmení je požadováno',
            'last_name.alpha' => 'Příjmení musí obsahovat pouze pismena',

            'password.required' => 'Heslo je požadováno',
            'password.min' => 'Heslo musí obsahovat alespoň 8 znaků',
            'password.confirmed' => 'Hesla se neshodují',

            //advanced info
            'address.required' => 'Adresa je požadováno',

            'money_per_hour' => 'Peníze musí obsahovat čislice',

            'mobile.required' => 'Telefonní čislo musí být vyplněné',
            'mobile.numeric' => 'Telefonní čislo musí obsahovat jen čísla',
            'mobile.digits' => 'Telefonní čislo je krátké',

            'username.required' => 'Přezdívka musí být vyplněná',
            'username.max' => 'Přezdívka je moc dlouhá',
            'username.unique' => 'Přezdívka již existuje',
        ];
    }


}
