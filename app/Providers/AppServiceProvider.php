<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

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
        // if(Auth::check() == NULL) {
        //     View::composer('*', function($view){
        //         $view->with('sideSiswa', Siswa::where('user_id', NULL)->where('tingkat','!=',NULL)->first());
        //     }); 
        // }else{
        //     View::composer('*', function($view){
        //         $view->with('sideSiswa', Siswa::where('user_id', Auth::user()->id)->where('tingkat','!=',NULL)->first());
        //     });
        // }
        
    }
}
