<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
            'hours' => 'numeric | required',
            'project_name' => 'required',
            'job' => 'required',
            'date' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'hours.required' => 'Hodiny musí být vyplněné',
            'hours.numeric' => 'Hodiny jsou číslo, debile',

            'project_name.required' => 'Místo musí být vyplněné',
            'job.required' => 'Vykonaná práce musí být vyplněná',
            'date.required' => 'Datum musí být vyplněné',
        ];
    }
}
