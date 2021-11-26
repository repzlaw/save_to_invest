<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        // Fortify::loginView(fn () => view('auth.login'));
        Fortify::loginView(fn () => inertia('Auth/login'));

        Fortify::registerView(fn () => inertia('Auth/register'));

        Fortify::requestPasswordResetLinkView(fn () => inertia('Auth/passwords/email', ['status' => session('status') ?? false]));

        Fortify::resetPasswordView(function ($request) {
            return inertia('Auth/passwords/reset', ['request' => $request->route('token')]);
        });

        Fortify::verifyEmailView(fn () => inertia('Auth/verify', ['resent' => session('resent') ?? false]));

        Fortify::confirmPasswordView(function () {
            return inertia('Auth/passwords/confirm');
        });
    }
}
