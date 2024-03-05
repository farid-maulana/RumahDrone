<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
          'name' => ['required'],
          'file' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
