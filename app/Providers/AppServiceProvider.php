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
        $files = $store->get('files', []);

        $facebook = $social_media['facebook'] ?? '';
        $linkedin = $social_media['linkedin'] ?? '';
        $instagram = $social_media['instagram'] ?? '';
        $youtube = $social_media['youtube'] ?? '';


        $address = $contact_information['address'] ?? '';
        $email = $contact_information['email'] ?? '';
        $phone = $contact_information['phone'] ?? '';

        $profile_link = $files['profile_link'] ?? '';

        View::share('facebook', $facebook);
        View::share('linkedin', $linkedin);
        View::share('instagram', $instagram);
        View::share('youtube', $youtube);

        View::share('address', $address);
        View::share('email', $email);
        View::share('phone', $phone);

        View::share('profile_link', $profile_link);
    }
}
