<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // function to redirect user to welcome page
    public function login()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        } else {
            return redirect(route('user'));
        }
    }

    // function to logout user
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    // login authenticaltion function
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
        ]);

        // get user credentials
        $credentials = $request->only('email', 'password');

        // check if user credentials are correct
        if (Auth::attempt($credentials)) {
            // check if user is an admin
            if (Auth::user()->is_admin == 0) {
                return redirect()->intended(route('admin'));
            } else {
                return redirect()->intended(route('user'));
            }
        } else {
            return redirect(route('login'))->with('error', 'Invalid credentials');
        }
    }

    // registration authentication function
    public function registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1 // 1 denotes as user, 0 denotes as admin
        ];

        $user = User::create($data);

        if (!$user) {
            session()->flash('error', 'Registration failed. Please try again.');
            return redirect(route('register'));
        } else {
            session()->flash('success', 'You have successfully registered! Please login to continue.');
            return redirect(route('login'));
        }
    }
}
