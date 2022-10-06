<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['required', 'string', 'max:20'],
            'mobile' => ['required', 'numeric', 'min:8'],
            'email' => ['required', 'email', 'unique:users'],
            'username' => ['required', 'max:20', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'money_per_hour' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {

        return[
            'first_name.required' => 'Jméno je požadováno',
            
            'last_name.required' => 'Příjmení je požadováno',

            'mobile.required' => 'Telefonní čislo musí být vyplněné',
            'mobile.numeric' => 'Telefonní čislo musí obsahovat jen čísla',
            'mobile.min' => 'Telefonní čislo je krátké',

            'email.required' => 'Email je požadován',
            'email.email' => 'Neplatná emailová adresa',
            'email.unique' => 'Email je již obsazen',

            'username.required' => 'Přezdívka musí být vyplněná',
            'username.max' => 'Přezdívka je moc dlouhá',
            'username.unique' => 'Přezdívka již existuje',
            
            'password.required' => 'Heslo je požadováno',
            'password.min' => 'Heslo musí obsahovat 8 znaků',
            'password.confirmed' => 'Hesla se neshodují',

            'money_per_hour.required' => 'Peníze jsou požadované',
            'money_per_hour.numeric' => 'Peníze jsou čísla',

        ];
    }
}
