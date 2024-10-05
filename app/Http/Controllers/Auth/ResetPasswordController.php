<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPassword\ResetRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Handle new password requests and logic
 *
 * This controller provides methods for displaying the password reset view
 * and handling the logic for resetting a user's password.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 04, 2024
 */
class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  Request  $request  The incoming request instance.
     */
    public function index(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  ResetRequest  $request  The request containing the password reset data.
     * @return RedirectResponse Redirects the user to the login page or back with an error message.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function reset(ResetRequest $request): RedirectResponse
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
