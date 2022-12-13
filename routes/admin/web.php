<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\CertificatesController;
use App\Http\Controllers\Admin\ContactUsMessagesController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\MaritimeLawsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OfficesController;
use App\Http\Controllers\Admin\PortDetailsController;
use App\Http\Controllers\Admin\PortsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceItemsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscribersController;
use App\Http\Controllers\Admin\TiersController;
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

    //about
    Route::resource('about', AboutUsController::class)->only(['index', 'edit', 'update']);

    //about
    Route::resource('services', ServicesController::class)->except(['show']);
    Route::resource('services/{service}/items', ServiceItemsController::class)->except(['show']);


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

    //Maritime Laws
    Route::resource('maritime_laws', MaritimeLawsController::class)->except(['show', 'edit', 'update']);

    //Equipment
    Route::resource('equipment', EquipmentController::class)->except(['show']);

    Route::put('equipment/{equipment}/update/{equipmentDetail}', [EquipmentController::class, 'update_equipment_details'])->name('equipment.update_equipment_details');
    Route::delete('equipment/{equipment}/destroy/{equipmentDetail}', [EquipmentController::class, 'destroy_equipment_details'])->name('equipment.destroy_equipment_details');

    //ports
    Route::resource('ports', PortsController::class);

    //calculator
    Route::resource('tiers', TiersController::class)->except(['show']);

    //our-offices
    Route::put('our-offices/update_offices_map', [OfficesController::class, 'update_offices_map'])->name('our-offices.update_offices_map');
    Route::resource('our-offices', OfficesController::class)->except(['show']);

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
    Route::put('settings/exclusive_agent', [SettingsController::class, 'exclusive_agent'])->name('settings.exclusive_agent');
    Route::put('settings/home_popup', [SettingsController::class, 'home_popup'])->name('settings.home_popup');

    Route::put('settings/home_popup/{status}', [SettingsController::class, 'update_home_popup'])->name('settings.update_home_popup');
    Route::put('settings/exclusive_agent/{status}', [SettingsController::class, 'update_exclusive_agent'])->name('settings.update_exclusive_agent');

    //subscribers
    Route::resource('subscribers', SubscribersController::class)->only(['index', 'destroy']);
    Route::get('subscribers/export', [SubscribersController::class, 'export'])->name('subscribers.export');

});


require __DIR__ . '/auth.php';
