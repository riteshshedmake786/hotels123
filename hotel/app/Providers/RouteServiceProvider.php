<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

//        $this->mapMerchantRoutes();
//
//        $this->mapSupplierRoutes();
//
//        $this->mapAdminRoutes();

        //
        $this->removeIndexPhpFromUrl();
    }

    protected function removeIndexPhpFromUrl()
    {
        if (Str::contains(request()->getRequestUri(), '/index.php/')) {
            $url = str_replace('index.php/', '', request()->getRequestUri());

            if (strlen($url) > 0) {
                header("Location: $url", true, 301);
                exit;
            }
        }
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapAdminRoutes()
//    {
//        Route::group([
//            'middleware' => ['web', 'admin', 'auth:admin'],
//            'prefix' => 'admin',
//            'as' => 'admin.',
//            'namespace' => $this->namespace,
//        ], function ($router) {
//            require base_path('routes/admin.php');
//        });
//    }

    /**
     * Define the "supplier" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapSupplierRoutes()
//    {
//        Route::group([
//            'middleware' => ['web', 'supplier', 'auth:supplier'],
//            'prefix' => 'supplier',
//            'as' => 'supplier.',
//            'namespace' => $this->namespace,
//        ], function ($router) {
//            require base_path('routes/supplier.php');
//        });
//    }

    /**
     * Define the "merchant" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapMerchantRoutes()
//    {
//        Route::group([
//            'middleware' => ['web', 'merchant', 'auth:merchant'],
//            'prefix' => 'merchant',
//            'as' => 'merchant.',
//            'namespace' => $this->namespace,
//        ], function ($router) {
//            require base_path('routes/merchant.php');
//        });
//    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
