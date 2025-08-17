<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'meters' => ['required', 'numeric'],
            'rooms' => ['required', 'integer'],
            'bathrooms' => ['required', 'integer'],
            'single_beds' => ['required', 'integer'],
            'double_beds' => ['required', 'integer'],
            'bunk_beds' => ['required', 'integer'],
            'wall_beds' => ['required', 'integer'],
            'sofa_beds' => ['required', 'integer'],
        ];
    }
}
