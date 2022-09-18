<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Valuestore\Valuestore;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        Paginator::defaultView('vendor.pagination.default');
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $social_media = $store->get('social_media', []);
        $contact_information = $store->get('contact_information', []);

        $facebook = $social_media['facebook'] ?? '';
        $linkedin = $social_media['linkedin'] ?? '';


        $address = $contact_information['address'] ?? '';
        $email = $contact_information['email'] ?? '';
        $phone = $contact_information['phone'] ?? '';

        View::share('facebook', $facebook);
        View::share('linkedin', $linkedin);

        View::share('address', $address);
        View::share('email', $email);
        View::share('phone', $phone);
    }
}
