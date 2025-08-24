<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user credentials
        $request->authenticate();

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Redirect to the dashboard page
        // If there was an intended destination before login, it will redirect there instead
        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Request $request)
    {
        // Log out the user from the system
        Auth::logout();

        // Clear all existing session data
        $request->session()->invalidate();

        // Generate new session token for security
        $request->session()->regenerateToken();

        // Redirect user to home page
        return redirect('/');
    }
}
