<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPaymentRequest extends FormRequest
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
            'order_id' => 'required|numeric',
            'sender_name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'bank_id' => 'required|numeric',
            'transfer_amount' => 'required',
            'picture' => 'required|max:5096|mimes:jpg,jpeg,png'
        ];
    }
}
