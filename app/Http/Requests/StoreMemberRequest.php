<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'email' => 'nullable',
            'facebook' => 'nullable',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'religion' => 'required',
            'sss' => 'required',
            'tin' => 'required',
            'education' => 'required',
            'skills' => 'required',
            'employment' => 'required',
            'income' => 'required|numeric',
        ];
    }
}
