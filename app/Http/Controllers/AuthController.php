<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Authenticates a user with the given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *         The HTTP request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     *         A redirect response to the intended URL on successful authentication, or back to the login page with an error message on failed authentication.
     *
     * @throws \Illuminate\Validation\ValidationException
     *         If the request validation fails.
     */
    public function authenticate(Request $request)
    {
        // Validate the request data.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user with the given credentials.
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks.
            $request->session()->regenerate();

            // Redirect the user to the intended URL if it exists, or the home page otherwise.
            return redirect()->intended('/');
        }

        // Redirect back to the login page with an error message if the authentication fails.
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Displays the login form.
     *
     * @return \Illuminate\View\View
     *         A view instance that displays the login form.
     */
    public function login()
    {
        // Render the login view.
        return view('login');
    }

    /**
     * Logs out the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     *         The HTTP request instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     *         A redirect response to the login page after logging out the user.
     */
    public function logout(Request $request)
    {
        // Log out the authenticated user.
        Auth::logout();

        // Invalidate the user's session to prevent any further access.
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks.
        $request->session()->regenerateToken();

        // Redirect the user to the login page after logging out.
        return redirect('/login');
    }

}
