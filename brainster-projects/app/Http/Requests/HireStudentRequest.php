<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HireStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_email' => 'required|email',
            'company_phone' => 'required',
            'company_name' => 'required'
        ];
    }
}
