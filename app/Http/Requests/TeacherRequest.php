<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'first_name' => 'required|alpha',
            'middle_name' => 'required',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => Rule::unique('teachers')->ignore($this->teacher),
            'teacher_avatar' => 'image',
        ];
    }
}
