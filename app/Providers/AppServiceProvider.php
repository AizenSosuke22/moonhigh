<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);
        $jsonFilePath = public_path('custom.json');
        
        if (File::exists($jsonFilePath)) {
            $customdata = json_decode(File::get($jsonFilePath), true);
            View::share('footerData', $customdata);
        }
    }
}
