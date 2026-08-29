<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Site\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', LocaleController::class)->name('locale.switch');

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/products', 'products')->name('products');
    Route::get('/network', 'network')->name('network');
    Route::get('/licenses', 'licenses')->name('licenses');
    Route::get('/contact', 'contact')->name('contact');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::middleware('can.manage.site')->group(function () {
            Route::controller(ContentController::class)->group(function () {
                Route::get('/hero', 'hero')->name('hero');
                Route::post('/hero', 'updateHero')->name('hero.update');

                Route::get('/about', 'about')->name('about');
                Route::post('/about', 'updateAbout')->name('about.update');

                Route::get('/products', 'products')->name('products');
                Route::post('/products', 'updateProducts')->name('products.update');

                Route::get('/network', 'network')->name('network');
                Route::post('/network', 'updateNetwork')->name('network.update');

                Route::get('/licenses', 'licenses')->name('licenses');
                Route::post('/licenses', 'updateLicenses')->name('licenses.update');

                Route::get('/partners', 'partners')->name('partners');
                Route::post('/partners', 'updatePartners')->name('partners.update');

                Route::get('/contact', 'contact')->name('contact');
                Route::post('/contact', 'updateContact')->name('contact.update');

                Route::get('/settings', 'settings')->name('settings');
                Route::post('/settings', 'updateSettings')->name('settings.update');
            });
        });

        Route::middleware('can.manage.users')->prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });
    });
});
