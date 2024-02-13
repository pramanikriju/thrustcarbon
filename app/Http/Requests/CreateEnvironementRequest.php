<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnvironementRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "data.*.type" => 'required|string|max:255',
            "data.*.reading" => 'required|decimal:2',
            "data.*.date" => 'string|nullable'
        ];
    }
}
