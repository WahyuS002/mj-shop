<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:4|max:255|unique:products,name',
            'brand_id' => 'nullable|numeric',
            'stock' => 'required|numeric',
            'price' => 'required',
            'discount' => 'nullable',
            'description' => 'nullable|max:5096',
            'pictures.*' => 'nullable|mimes:jpg,jpeg,png,webp|max:5096'
        ];
    }
}
