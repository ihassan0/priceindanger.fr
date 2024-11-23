<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

//     public function store(Request $request)
//     {
//         // Validate the login credentials
//         $this->validateLogin($request);

//         // Attempt to log the user in
//         if (Auth::attempt($request->only('email', 'password'))) {
//             // Redirect to the desired route if authentication is successful
//             return redirect()->intended(route('admin.dashboard'));
//         }
// //  dd('invalid');
//         // If login fails, throw a validation exception
//         throw ValidationException::withMessages([
//             'email' => 'Email or password is incorrect.',
//         ]);
//     }
}



