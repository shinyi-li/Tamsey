<?php
/*
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// adding livewire route for profile?
use App\Http\Livewire\Profile;
Route::middleware('auth')->group(function () {
    Route::get('/profile-update', Profile::class)->name('profile.update');
});

require __DIR__.'/auth.php';
*/
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dashboard;

// Welcome page
Route::view('/', 'welcome');

// Dashboard page (Breeze default)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// === Your custom Livewire Profile Page ===
Route::middleware(['auth'])->group(function () {
    Route::view('/profile-update', 'profile')   // or 'profile.edit' — whichever matches your actual path
        ->name('profile.update');
});

// (Optional) Add your custom dashboard later:
// Route::get('/dashboard-custom', Dashboard::class)->middleware('auth')->name('dashboard.custom');

require __DIR__.'/auth.php';