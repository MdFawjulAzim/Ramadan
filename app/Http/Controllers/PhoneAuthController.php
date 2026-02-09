<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneAuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    /**
     * Authenticate by phone number.
     * If phone exists, log in. If not, create new user and log in.
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $phone = $request->phone;
        $name = $request->name;

        // Check if user exists with this phone number
        $user = User::where('phone', $phone)->first();

        if ($user) {
            // User exists, log them in
            Auth::login($user, true);
        } else {
            // New user, create and log in
            $user = User::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            Auth::login($user, true);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
