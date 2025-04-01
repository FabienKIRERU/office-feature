<?php

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');
Route::get('/', function () {
    return Inertia::render('Home', [
        'properties' => Property::with('images')->latest()->take(6)->get(),
        'categories' => Category::all(),
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
