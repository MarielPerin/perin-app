<?php

namespace App\Providers;

use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function($app){
            $products=[
                [
                    'id' =>1,
                    'name' => 'Apple',
                    'category' => 'Fruits',
                ],
                [
                    'id' =>2,
                    'name' => 'Brocolli',
                    'category' => 'Vegetables',
                ],
                [
                    'id' =>3,
                    'name' => 'Sardines',
                    'category' => 'Canned foods'
                ]
            ];

            return new ProductService($products);

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey', 'abc123');
    }
}
