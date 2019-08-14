<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CountriesRequest extends Request
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
            'txtCountryCode' =>'required|unique:apps_countries,country_code|max:2',
            'txtCountryName' =>'required|unique:apps_countries,country_name|max:100'
        ];
    }
    public function messages()
    {
        return [
            'txtCountryCode.required' => 'Please, provide country_code !',
            'txtCountryName.required' => 'Please, provide country_name !',
            'txtCountryCode.unique' => 'The country code was exist !',
            'txtCountryName.unique' => 'The country name was exist !'
        ];
    }
}
