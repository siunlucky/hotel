<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Booking;
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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');


        View::composer('partials.sidebar', function ($view) {
            $count = Booking::where('booking_status', 'requested')->count();
            $view->with('bookingRequestCount', $count);
        });
    }
}
