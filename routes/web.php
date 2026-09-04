<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\Admin\SportController as AdminSportController;


// Halaman awal
Route::get('/', function () {
    return redirect()->route('dashboard');
});


// Semua route di bawah harus login
Route::middleware([
    'auth',
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // Detail lapangan
    Route::get('/venues/{venue}', [VenueController::class, 'show'])
        ->name('venues.show');


    // Booking lapangan
    Route::get('/venues/{venue}/booking', [BookingController::class, 'create'])
        ->name('bookings.create');

    Route::post('/venues/{venue}/booking', [BookingController::class, 'store'])
        ->name('bookings.store');

    Route::get('/bookings/{booking}/success', [BookingController::class, 'success'])
        ->name('bookings.success');

    Route::get('/bookings', [BookingController::class, 'index'])
        ->name('bookings.index');

    Route::get('/orders', [BookingController::class, 'orders'])
        ->name('bookings.orders');

    Route::get('/bookings/{booking}', [BookingController::class, 'show'])
        ->name('bookings.show');


    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Shop
    Route::get('/shop', function () {
        return view('shop.index');
    })->name('shop.index');


    // Halaman admin
    // Hanya user dengan is_admin = true yang bisa akses
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('admin')
        ->group(function () {

            // CRUD lapangan
            Route::resource(
                'venues',
                AdminVenueController::class
            );

            // CRUD olahraga
            Route::resource(
                'sports',
                AdminSportController::class
            );

        });

});


// Route login dan register
require __DIR__.'/auth.php';