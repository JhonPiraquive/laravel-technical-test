<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPassword\SendLinkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

/**
 * Handle password reset link requests and logic
 *
 * This controller provides methods to display the password reset link request
 * view and to handle the sending of password reset links to users.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 04, 2024
 */
class ForgotPasswordController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function index(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  SendLinkRequest  $request  The request containing the email address.
     * @return RedirectResponse Redirects the user back with a status or error message.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendLink(SendLinkRequest $request): RedirectResponse
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
