<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use DB;
use View;

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
       View::composer('*', function ($view) {
        $hindiCount = DB::table('visitors')->where('language', 'hindi')->sum('visit_count');
        $englishCount = DB::table('visitors')->where('language', 'english')->sum('visit_count');

        $view->with([
            'hindiVisitorCount' => $hindiCount,
            'englishVisitorCount' => $englishCount
        ]);
    });
    }
}
