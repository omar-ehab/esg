<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\MaritimeLawsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PortsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SuezCanalController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::get('/about-us', AboutUsController::class)->name('about-us');

Route::get('/offices', [OfficeController::class, 'index'])->name('offices.index');

Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::post('/career', [CareerController::class, 'save'])->name('career.save');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'save'])->name('contact-us.save');


Route::post('/inquiry-form', InquiriesController::class)->name('inquiry-form.save');


Route::get('/ports', PortsController::class)->name('ports.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


Route::post('/newsletter', NewsLetterController::class)->name('newsletter.save');


Route::post('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search-result', [SearchController::class, 'searchResult'])->name('search-result');

Route::get('/services/suez-canal', [SuezCanalController::class, 'index'])->name('services.suez-canal');
Route::get('/services/suez-canal/about', [SuezCanalController::class, 'about'])->name('services.suez-canal.about');
Route::get('/services/suez-canal/convoy', [SuezCanalController::class, 'convoy'])->name('services.suez-canal.convoy');
Route::get('/services/suez-canal/calculator', [SuezCanalController::class, 'calculator'])->name('services.suez-canal.calculator');
Route::post('/services/suez-canal/calculator', [SuezCanalController::class, 'calculate'])->name('services.suez-canal.calculate');
Route::get('/services/{service}', [ServicesController::class, 'show'])->name('services.show');


Route::get('/maritime_laws', [MaritimeLawsController::class, 'index'])->name('maritime_laws.index');
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');



