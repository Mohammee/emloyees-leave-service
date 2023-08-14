<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('employees')->ignore($this->route('employee'))
            ],
            'password' => [
                ($this->isMethod('put') ? 'nullable' : 'required'),
                'string',
                'max:100',
                'confirmed'
            ],
            'job' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'joined_at' => ['required', 'date'],
            'status' => ['required', 'in:active,inactive'],
            'birthday' => ['nullable', 'date_format:Y-m-d'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ];
    }
}
