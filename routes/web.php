<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/staff', function () {
    return view('staff');
})->name('staff');

Route::view('dashboard', 'backend.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('tambah-agenda', 'backend.addEvent')
    ->middleware(['auth', 'verified'])
    ->name('addEvent');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
