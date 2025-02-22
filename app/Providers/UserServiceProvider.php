<?php

namespace App\Providers;

use App\Services\UserServices;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserServices:: class, function($app){
            $users = [
                [
                    'name' => 'John Doe',
                    'gender' => 'Male'
                ],
                [
                    'name' => 'Jane Doe',
                    'gender' => 'Female'
                ],
                [
                    'name' => 'Mariel Perin',
                    'gender' => 'Female'
                ]
            ];

            return new UserServices($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
