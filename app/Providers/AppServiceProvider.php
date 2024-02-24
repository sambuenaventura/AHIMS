<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Students;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
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
        //
        View::share('title', 'HIMS');
        // Paginator::useBootstrapFive();

        // rekta na papakita yung data when booting student.index(view)
        // View::composer('student.index', function($view) {
        //     $view->with('students', Students::all());
        // });
    }

        // Helper function to generate ordinal numbers
    function getOrdinal($number) {
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            return $number . 'th';
        }
        switch ($number % 10) {
            case 1:
                return $number . 'st';
            case 2:
                return $number . 'nd';
            case 3:
                return $number . 'rd';
            default:
                return $number . 'th';
        }
    }

}
