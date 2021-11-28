<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            // 'lga_id' => 'required',
            // 'id' => 'required',
            'name' => 'required',
            'gender'=> 'required',
            'dob' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'phone' => 'required',
            'religion' => 'required',
        ];
    }
}
