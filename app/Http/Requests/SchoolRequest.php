<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'months_no' => 'required|integer|max:12',
            'date_started' => 'required',
            'school_name' => 'required|alpha_spaces',
            'depEd_no' => 'required|string',
            'city' => 'required|alpha',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'email' => 'required|email',
            'facebook'=> 'required|string',
            'website'=>'required|string',
            'school_logo'=>'image'
        ];
    }
}
