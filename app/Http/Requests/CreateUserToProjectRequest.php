<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserToProjectRequest extends FormRequest
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
            'user_id' => ['required'],
            'project_id' => ['required'],
        ];
    }

    public function messages()
    {

        return[
            'user_id.required' => 'Zaměstnanec musí být vybrán',
            'project_id.required' => 'Projekt musí být vybrán',
        ];
    }
}
