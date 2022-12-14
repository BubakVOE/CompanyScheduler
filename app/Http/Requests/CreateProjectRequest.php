<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'company_id' => ['required'],
            'name' => ['required'],
            'type_of_job' => ['required'],
            'street_address' => ['required'],

        ];
    }

    public function messages()
    {

        return[
            'company_id.required' => 'Společnost musí být vybrána',
            'name.required' => 'Název projektu musí být vyplněné',

            'type_of_job.required' => 'Vykonaná práce je požadován',

            'street_address.required' => 'Místo musí být vyplněná',
        ];
    }

}
