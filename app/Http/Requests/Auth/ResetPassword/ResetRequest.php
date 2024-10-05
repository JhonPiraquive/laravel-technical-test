<?php

namespace App\Http\Requests\Auth\ResetPassword;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

/**
 * New password store request validator
 *
 * This class handles the validation rules for resetting a user's password.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class ResetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
