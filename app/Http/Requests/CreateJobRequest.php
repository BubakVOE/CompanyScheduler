<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'project_id' => ['required'],
            'user_id' => ['required'],
            'money_per_hour' => ['required', 'numeric'],
            'job' => ['required'],
            'hours' => ['required','numeric'],
            'date' => ['required', 'date',],
        ];
    }
    
    public function messages()
    {

        return[
            'project_id.required' => 'Projekt musí být vybraný',
            'user_id.required' => 'Uživatel musí být vybraný',
            
            'money_per_hour.required' => 'Peníze jsou požadované',
            'money_per_hour.numeric' => 'Peníze jsou čísla',

            'job.required' => 'Job je požadováno',

            'hours.required' => 'Hodiny jsou požadováné',
            'hours.numeric' => 'Hodiny musí být číslo',

            'date.required' => 'Datum je požadován',
        ];
    }
}
