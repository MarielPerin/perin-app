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
                    'id' => 1,
                    'name' => 'John Doe',
                    'gender' => 'Male'
                ],
                [
                    'id' => 2,
                    'name' => 'Jane Doe',
                    'gender' => 'Female'
                ],
                [
                    'id' => 3,
                    'name' => 'Mariel Perin',
                    'gender' => 'Female'
                ],
                [
                    'id' => 4,
                    'name' => 'Britney Rafer',
                    'gender' => 'Female'
                ],
                [
                    'id' => 5,
                    'name' => 'Luis Rances',
                    'gender' => 'Male'
                ],
                [
                    'id' => 6,
                    'name' => 'Jull Azarcon',
                    'gender' => 'Male'
                ],
                [
                    'id' => 7,
                    'name' => 'Xam Diano',
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
