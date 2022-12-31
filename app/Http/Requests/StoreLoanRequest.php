<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
            'member_id' => 'required',
            'loan_name' => 'required',
            'principal' => 'required|numeric|max:999999',
            'rate' => 'required|numeric|max:100',
            'term' => 'required|numeric|max:100',
            'amortization' => 'required|numeric|max:100',
            'maturity' => 'required|date'
        ];
    }
}
