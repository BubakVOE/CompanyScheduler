<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'name' => ['required'],
            'file' => ['required', 'file', 'mimes:jpeg,png,doc,docs,pdf',],    
            'color' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'name je požadováno',

            'file.required' => 'Logo je požadováno',
            'file.file' => 'Nahrej logo společnosti',
            'file.mimes' => 'Podporované formáty: jpeg,png,doc,docs,pdf',
            //'file.max' => 'cover_path je přílíš velký',

            'color.required' => 'company_color je požadováno',
            


        ];
    }

}
