<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class Step1Request extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'province' => ['required', 'string', 'max:30'],
            'state' => ['required','string'],
            'city' => ['required', 'string', 'max:30'],
            'cap' => ['required', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:100'],
            'civ' => ['required', 'string', 'max:5'],
        ];
    }
}
