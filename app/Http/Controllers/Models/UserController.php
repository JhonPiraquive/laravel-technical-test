<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Http\Requests\Models\User\UpdatePasswordRequest;
use App\Http\Requests\Models\User\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Update the user's password.
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
     */
    public function edit(Request $request): View
    {
        return view('user.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user information.
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
