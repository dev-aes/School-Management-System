<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'lrn' => 'required|integer',
            'first_name' => 'required|alpha',
            'middle_name' => 'required|alpha_spaces',
            'last_name' => 'required|alpha',
            'birth_date' => 'required|string',
            'gender' => 'required|alpha',
            'section_id' => 'required|string',
            'nationality' => 'required|alpha_spaces',
            'city' => 'required|alpha_spaces',
            'province' => 'required|alpha_spaces',
            'country' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11',
            'facebook' => 'required|string',
            'email' => Rule::unique('students')->ignore($this->student),
            'student_avatar' => 'image',
            'is_imported' => ''
        ];
    }
}
