<?php

namespace App\Http\Requests\Models\Customer;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Customer update request validator
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 04, 2024
 */
class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|regex:/^[\w\.-]+@[\w\.-]+\.[\w\.-]+$/',
            'phone' => 'required|regex:/^\+\d{1,3}\d{10}$/',
            'address' => 'required',
        ];
    }
}
