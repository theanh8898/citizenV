<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeclareCitizenInformationRequest extends FormRequest
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
            'id_card' => 'required|regex:/^\d+$/|digits:12|unique:citizens,id_card',
            'full_name' => 'required|max:255',
            'dob' => 'date_format:Y-m-d|before:today',
            'gender' => 'required|max:10',
            'native_address_id' => 'required|regex:/^\d+$/|max:8',
            'native_address' => 'required|max:255',
            'permanent_address_id' => 'required|regex:/^\d+$/|max:8',
            'permanent_address' => 'required|max:255',
            'temp_address_id' => 'required|regex:/^\d+$/|max:8',
            'temp_address' => 'required|max:255',
            'religion' => 'required|max:10',
            'edu_level' => 'required|max:10',
            'occupation' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
