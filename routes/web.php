<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index']); //
Route::get('/aboutus', [HomeController::class, 'about'])->name('aboutus');
Route::get('/products', [HomeController::class, 'products'])->name('products'); //
Route::get('/contact', [HomeController::class, 'contact'])->name('contact'); //
Route::get('/products/{id}', [HomeController::class, 'show'])->name('services.show');
Route::post('/send-message', [HomeController::class, 'sendMessage'])->name('send.message');







Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    ->name('admin.')
    ->middleware('user.auth') // Use the alias here
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('carousel', CarouselController::class, );
        Route::resource('about_us', AboutUsController::class, );
        Route::resource('products', ProductsController::class, );
        Route::resource('content', ContentController::class, );
        Route::resource('testimonials', TestimonialsController::class, );
        Route::resource('team', TeamController::class, );

    });

