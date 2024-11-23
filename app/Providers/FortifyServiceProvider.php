<?php

namespace App\Providers;

use App\Actions\Fortify\UpdateUserPassword;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
    
            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
    
            return null;
        });


        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password'); // Make sure this view exists
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
        // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        // Fortify::loginView(function () {
        //     return view('auth.login');
        // });

        // // Customize the redirect after login
        // Fortify::loginResponse(function (Request $request) {
        //     return redirect()->route('your.custom.route');
        // });
    }
}
