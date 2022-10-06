<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'hours' => 'numeric | required | gt:0',
            'place' => 'required',
            'job' => 'required',
            'date' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'hours.required' => 'Hodiny musí být vyplněné',
            'hours.numeric' => 'Hodiny jsou číslo, debile',
            'hours.gt' => 'Zadal jsi záporné hodiny',

            'place.required' => 'Místo musí být vyplněné',
            'job.required' => 'Vykonaná práce musí být vyplněná',
            'date.required' => 'Datum musí být vyplněné',
        ];
    }
}
