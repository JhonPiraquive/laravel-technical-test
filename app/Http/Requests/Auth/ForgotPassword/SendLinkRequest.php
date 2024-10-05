<?php

namespace App\Http\Requests\Auth\ForgotPassword;

use Illuminate\Foundation\Http\FormRequest;

/**
 * User reset link store request validator
 *
 * This class handles the validation rules for sending a password reset link
 * to the user via email.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class SendLinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'lowercase',
                'email',
                'max:255',
            ],
        ];
    }
}
