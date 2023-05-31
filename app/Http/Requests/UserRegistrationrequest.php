<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|digits:10',
            'role_id' => 'nullable|numeric',
            'course_id' => 'nullable|numeric',
            'department_id' => 'nullable|numeric',
            'password' => 'required|string|min:6|confirmed',
        ];
    }


    public function messages()
    {
        return [
            'fname' => "First Name field is required",
            'lname' => 'Last Name field is required'
        ];
    }
}
