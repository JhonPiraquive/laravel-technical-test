<?php

namespace App\Http\Requests\Models\Customer;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Customer store request validator
 *
 * This class handles the validation rules for storing customer data.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class StoreRequest extends FormRequest
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
