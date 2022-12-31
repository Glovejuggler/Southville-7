<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'prov_address' => 'nullable',
            'contact_number' => 'required|max:20',
            'email' => 'nullable|email',
            'facebook' => 'nullable',
            'birthdate' => 'required|date',
            'birthplace' => 'required',
            'religion' => 'required',
            'sss' => 'required',
            'tin' => 'required',
            'education' => 'required',
            'skills' => 'required',
            'employment' => 'required',
            'income' => 'required|numeric',
            'beneficiaries.*.name' => 'required',
            'beneficiaries.*.birthday' => 'required',
            'beneficiaries.*.relation' => 'required',
            'beneficiaries.*.phone' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            'beneficiaries.*.name.required' => 'Name is required',
            'beneficiaries.*.birthday.required' => 'Birthday is required',
            'beneficiaries.*.relation.required' => 'Relation field is required',
            'beneficiaries.*.phone.required' => 'Phone is required',
        ];
    }
}
