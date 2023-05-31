<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadReportRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'year' => 'required|numeric|digits:4',
            'supervisor' => 'required|numeric',
            'abstract' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'document.mimes' => 'The document must be in PDF format',
            'document.max' => 'The document must not exceed 5MB in size',
            'document.file' => 'The document should be a file',
        ];
    }
}
