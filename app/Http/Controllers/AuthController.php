<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // function to logout user
    public function logout(Request $request)
    {
        Log::info('Logging out:', ['user' => Auth::user()]);
        Auth::logout();
        Session::flush();
        $request->session()->regenerate();
        Log::info('User logged out:', ['user' => Auth::user()]);
        return redirect('/login');
    }

    // Sending login post request to the server
    public function loginPost(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'The email field is required.',
                'password.required' => 'The password field is required.',
            ]
        );

        // get user credentials
        $credentials = $request->only('email', 'password');

        // check if user credentials are valid
        if (Auth::attempt($credentials)) {

            Log::info('[Controller] authenticated', ['user' => Auth::user()]);

            if (Auth::user()->privilege === 1) {
                return redirect()->intended(route('admin'));
            }

            return redirect()->intended(route('user'));
        }

        Log::info('[Controller] not authenticated:', ['user' => Auth::user()]);

        return redirect(route('login'))
            ->with(
                'error',
                'Invalid credentials'
            );
    }

    // registration authentication function
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required'
        ]);

        $data = [
            'user_id' => mt_rand(100000, 900000),
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'privilege' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'organization' => 'unassigned'
        ];

        $creation = User::create($data);

        if (!$creation) {
            session()->flash('error', 'Registration failed. Please try again.');
            return redirect(route('register'));
        } else {
            session()->flash('success', 'You have successfully registered! Please login to continue.');
            return redirect(route('login'));
        }
    }
}
