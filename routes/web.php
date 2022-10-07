<?php

use App\Http\Controllers\Backend\About\AboutController;
use App\Http\Controllers\Backend\About\AboutServices;
use App\Http\Controllers\Backend\About\AboutServicesController;
use App\Http\Controllers\Backend\About\AboutTeamController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Home\HomeAboutController;
use App\Http\Controllers\Backend\Home\HomeFeaturesController;
use App\Http\Controllers\Backend\Home\HomeServicesController;
use App\Http\Controllers\Backend\Home\HomeSliderController;
use App\Http\Controllers\Backend\Home\HomeTestimonialsController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontendController;
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

// FrontendController
Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{title}', 'servicesdetail')->name('services.detail');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactpost')->name('contactpost');
});


// AdminController
Route::prefix('admin')->middleware('auth')->group(function () {
    // Admin Routes
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');

    // User Routes
    Route::controller(UserController::class)->group(function(){
        Route::get('/user', 'index')->name('user.index');
        Route::put('/user', 'update')->name('user.update');
        // User password
        Route::get('/user/change-password', 'passwordForm')->name('user.passwordForm');
        Route::put('/user/change-password', 'changePassword')->name('user.changePassword');
    });

    // Home Slider Routes
    Route::controller(HomeSliderController::class)->group(function(){
        Route::get('/homeslider', 'index')->name('slider.index');
        Route::get('/homeslider/create', 'create')->name('slider.create');
        Route::post('/homeslider/create', 'store')->name('slider.store');
        Route::get('/homeslider/edit/{id}', 'edit')->name('slider.edit');
        Route::put('/homeslider/edit', 'update')->name('slider.update');
        Route::get('/homeslider/{id}', 'destroy')->name('slider.destroy');
    });
    // Home About Routes
    Route::controller(HomeAboutController::class)->group(function(){
        Route::get('/homeabout', 'index')->name('homeabout.index');
        Route::put('/homeabout', 'update')->name('homeabout.update');
    });
    // Home Services Routes
    Route::controller(HomeServicesController::class)->group(function(){
        Route::get('/homeservices', 'index')->name('homeservices.index');
        Route::get('/homeservices/create', 'create')->name('homeservices.create');
        Route::post('/homeservices/create', 'store')->name('homeservices.store');
        Route::get('/homeservices/edit/{id}', 'edit')->name('homeservices.edit');
        Route::put('/homeservices/edit', 'update')->name('homeservices.update');
        Route::get('/homeservices/{id}', 'destroy')->name('homeservices.destroy');
    });
    // Home Features Routes
    Route::controller(HomeFeaturesController::class)->group(function(){
        Route::get('/homefeatures', 'index')->name('homefeatures.index');
        Route::get('/homefeatures/create', 'create')->name('homefeatures.create');
        Route::post('/homefeatures/create', 'store')->name('homefeatures.store');
        Route::get('/homefeatures/edit/{id}', 'edit')->name('homefeatures.edit');
        Route::put('/homefeatures/edit', 'update')->name('homefeatures.update');
        Route::get('/homefeatures/{id}', 'destroy')->name('homefeatures.destroy');
    });
    // Home Testimonials Routes
    Route::controller(HomeTestimonialsController::class)->group(function(){
        Route::get('/hometestimonials', 'index')->name('hometestimonials.index');
        Route::get('/hometestimonials/create', 'create')->name('hometestimonials.create');
        Route::post('/hometestimonials/create', 'store')->name('hometestimonials.store');
        Route::get('/hometestimonials/edit/{id}', 'edit')->name('hometestimonials.edit');
        Route::put('/hometestimonials/edit', 'update')->name('hometestimonials.update');
        Route::get('/hometestimonials/{id}', 'destroy')->name('hometestimonials.destroy');
    });

    // About Routes
    Route::controller(AboutController::class)->group(function(){
        Route::get('/about', 'index')->name('about.index');
        Route::put('/about', 'update')->name('about.update');
    });
    // About Services Routes
    Route::controller(AboutServicesController::class)->group(function(){
        Route::get('/aboutservices', 'index')->name('aboutservices.index');
        Route::get('/aboutservices/create', 'create')->name('aboutservices.create');
        Route::post('/aboutservices/create', 'store')->name('aboutservices.store');
        Route::get('/aboutservices/edit/{id}', 'edit')->name('aboutservices.edit');
        Route::put('/aboutservices/edit', 'update')->name('aboutservices.update');
        Route::get('/aboutservices/{id}', 'destroy')->name('aboutservices.destroy');
    });
    // About Team Routes
    Route::controller(AboutTeamController::class)->group(function(){
        Route::get('/aboutteam', 'index')->name('aboutteam.index');
        Route::get('/aboutteam/create', 'create')->name('aboutteam.create');
        Route::post('/aboutteam/create', 'store')->name('aboutteam.store');
        Route::get('/aboutteam/edit/{id}', 'edit')->name('aboutteam.edit');
        Route::put('/aboutteam/edit', 'update')->name('aboutteam.update');
        Route::get('/aboutteam/{id}', 'destroy')->name('aboutteam.destroy');
    });

    // Services Routes
    Route::controller(ServicesController::class)->group(function(){
        Route::get('/services', 'index')->name('services.index');
        Route::get('/services/create', 'create')->name('services.create');
        Route::post('/services/create', 'store')->name('services.store');
        Route::get('/services/edit/{id}', 'edit')->name('services.edit');
        Route::put('/services/edit', 'update')->name('services.update');
        Route::get('/services/{id}', 'destroy')->name('services.destroy');
    });

});
