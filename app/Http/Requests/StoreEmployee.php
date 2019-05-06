<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'first_name' => 'required|max:200',
            'last_name' => 'requred|max:200',
            'company_id' => 'nullable',
            'email' => 'nullable|email|max:250',
            'phone' => 'nullable',
            'website' => 'nullable|max:250'
        ];
    }
}
