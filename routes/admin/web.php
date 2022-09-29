<?php

use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\CertificatesController;
use App\Http\Controllers\Admin\ContactUsMessagesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PortDetailsController;
use App\Http\Controllers\Admin\PortsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscribersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //banners
    Route::resource('banners', BannersController::class);

    //career
    Route::resource('jobs', JobsController::class)->except(['show']);
    Route::resource('careers', CareersController::class)->only(['index', 'destroy']);
    Route::get('careers/export', [CareersController::class, 'export'])->name('careers.export');

    //contact-us-messages
    Route::resource('contact-us-messages', ContactUsMessagesController::class)->only(['index']);
    Route::get('contact-us-messages/export', [ContactUsMessagesController::class, 'export'])->name('contact-us-messages.export');

    //certificates
    Route::resource('certificates', CertificatesController::class)->except(['show']);

    //inquiries
    Route::resource('inquiries', InquiriesController::class)->only(['index', 'destroy']);
    Route::get('inquiries/export', [InquiriesController::class, 'export'])->name('inquiries.export');

    //news
    Route::resource('news', NewsController::class)->except(['show']);

    //ports
    Route::resource('ports', PortsController::class);

    //port details
    Route::get('/ports/{port}/port-details/create', [PortDetailsController::class, 'create'])->name('port-details.create');
    Route::post('/ports/{port}/port-details', [PortDetailsController::class, 'store'])->name('port-details.store');
    Route::get('/ports/{port}/port-details/{portDetails}/edit', [PortDetailsController::class, 'edit'])->name('port-details.edit');
    Route::put('/ports/{port}/port-details/{portDetails}', [PortDetailsController::class, 'update'])->name('port-details.update');
    Route::delete('/ports/{port}/port-details/{portDetails}', [PortDetailsController::class, 'destroy'])->name('port-details.destroy');

    //profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/change_data', [ProfileController::class, 'change_data'])->name('profile.change_data');
    Route::put('profile/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');

    //settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings/social_media', [SettingsController::class, 'social_media'])->name('settings.social_media');
    Route::put('settings/contact_information', [SettingsController::class, 'contact_information'])->name('settings.contact_information');
    Route::put('settings/company_profile', [SettingsController::class, 'company_profile'])->name('settings.company_profile');

    //subscribers
    Route::resource('subscribers', SubscribersController::class)->only(['index', 'destroy']);
    Route::get('subscribers/export', [SubscribersController::class, 'export'])->name('subscribers.export');

});


require __DIR__ . '/auth.php';
