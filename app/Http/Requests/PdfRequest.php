<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PdfRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required|mimes:pdf'
        ];
    }

    public function messages(): array
    {
        return [
            'file.mimes' => 'Only PDF files can be uploaded',
            'file.required' => 'PDF file is required',
        ];
    }
}
