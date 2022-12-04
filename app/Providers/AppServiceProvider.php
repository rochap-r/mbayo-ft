<?php

namespace App\Providers;

use App\Models\AboutConfig;
use App\Models\BgConfig;
use App\Models\ChoiceConfig;
use App\Models\ContactConfig;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        
        //les données de contact
        $contact=ContactConfig::find(1);
        View::share('contact',$contact);

        //les données d'apropos
        $about=AboutConfig::find(1);
        View::share('about',$about);

    
    }
}
