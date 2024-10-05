<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Http\Requests\Models\User\UpdatePasswordRequest;
use App\Http\Requests\Models\User\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Handle User requests and logic.
 *
 * This controller provides methods for managing user information,
 * including updating passwords and user details.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 *
 * @version October 05, 2024
 */
class UserController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  UpdatePasswordRequest  $request  The request containing the new password.
     * @return RedirectResponse Redirects back with a status message.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }

    /**
     * Display the user form.
     *
     * @param  Request  $request  The incoming request.
     * @return View The view for editing user information.
     */
    public function edit(Request $request): View
    {
        return view('user.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user information.
     *
     * @param  UpdateRequest  $request  The request containing user data.
     * @return RedirectResponse Redirects to the user edit route with a status message.
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('user.edit')->with('status', 'user-updated');
    }
}
