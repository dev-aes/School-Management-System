<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'grades' => '',
            'quarter_id' => '',
            'section_id'=>'',
            'student_id'=>'',
            'subject_id'=>'',
            'grades_id'=>'',
        ];
    }
}
