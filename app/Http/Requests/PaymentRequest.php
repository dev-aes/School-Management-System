<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_fee_id' => 'required',
            'amount' => 'required|int|min:50',
            'remarks' => 'required',
            'official_receipt' => 'required|unique:payments',
            'payment_type' => 'required',
            'payment_mode_id' => 'required',
            'user_id' => 'required'  
        ];
    }
}
