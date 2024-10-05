<?php

namespace App\Http\Requests\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * Update password request validator
 *
 * This class handles the validation rules for updating a user's password.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                'current_password'
            ],
            'password' => [
                'required',
                Password::defaults(),
                'confirmed'
            ],
        ];
    }
}
