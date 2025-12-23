<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvincyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\userDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LocationController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'verified'])->group(function () {

    // DASHBOARD USER
    Route::get('/dashboard', [userDashboardController::class, 'index'])->name('user.index');

    //Like
    Route::post('/destination/{id}/like',[LikeController::class, 'toggle'])->middleware('auth')->name('destination.like');

    //User Input
    Route::post('/user/destination/store', [DestinationController::class, 'userStore'])->name('user.destination.store');
    Route::get('/user/destination/create', [DestinationController::class, 'userCreate'])->name('user.create');

    //User View
    Route::get('/user/destination/{id}', [DestinationController::class, 'userShow'])->name('user.destination.show');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// AJAX Route
Route::get('get-kota/{provincy_id}',[DestinationController::class, 'getKota']);
Route::get('get-kecamatan/{city_id}',[DestinationController::class, 'getKecamatan']);

Route::middleware(['auth', 'admin'])->group(function () {

        // Admin Dashboard
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        //Destination Route
        Route::get('admin/destination/{id}/delete', [DestinationController::class, 'destroy'])->name('destination.delete');
        Route::resource('admin/destination', DestinationController::class);

        // Route dependent dropdown Destination
        // Route::post('admin/destination/fetch', [DestinationController::class, 'fetch'])
        //     ->name('destination.fetch');

        //Facility Route
        Route::get('admin/facility/{id}/delete', [FacilityController::class, 'destroy']);
        Route::resource('admin/facility', FacilityController::class);

        //Categories Route
        Route::get('admin/category/{id}/delete', [CategoryController::class, 'destroy']);
        Route::resource('admin/category', CategoryController::class);

        // //Location Route
        // Route::get('admin/location/{id}/delete', [LocationController::class, 'destroy']);
        // Route::resource('admin/location', LocationController::class);

        //province Route
        Route::get('admin/province/{id}/delete', [ProvincyController::class, 'destroy']);
        Route::resource('admin/province', ProvincyController::class);

        //Cityrovince Route
        Route::get('admin/city/{id}/delete', [CityController::class, 'destroy']);
        Route::resource('admin/city', CityController::class);

        //State Route
        Route::get('admin/state/{id}/delete', [StateController::class, 'destroy']);
        Route::resource('admin/state', StateController::class);

        //Review Route
        Route::get('admin/review/{id}/delete', [ReviewController::class, 'destroy']);
        Route::resource('admin/review', ReviewController::class);

        //Approvation
        Route::get('admin/destination/{id}/approve', [DestinationController::class, 'approve']);
        Route::get('admin/destination/{id}/reject', [DestinationController::class, 'reject']);

    });
// AJAX Fetch
// Route::post('/destination/fetch', [DestinationController::class, 'fetch'])->name('destination.fetch');

Route::get('/redirect-after-login', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.index');
});

require __DIR__.'/auth.php';
