<?php

use App\Http\Controllers\BaptismsController;
use App\Http\Controllers\BouquetsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EighteenthsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\WeddingsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//home
Route::get("/acasa", function() {
    return Inertia::render("Home");//static
})->name("home");

//contact
Route::get("/contact", [ContactController::class, "create"])->name("contact.create");//static
Route::post("/contact", [ContactController::class,"store"])->name("contact.store");

//about us
Route::get("/despre-noi", function() {
    return Inertia::render("About");//static
})->name("about");

//livrare
Route::get("/livrari", function() {
    return Inertia::render("Delivery");//static
})->name("delivery");

//galerie
Route::get("/galerie", function() {
    return Inertia::render("Gallery");//static
})->name("gallery");

//buchete
Route::get("/buchete", BouquetsController::class)->name("bouquets");

//evenimente
Route::get("/evenimente", EventsController::class)->name("events");

//majorate
Route::get("/majorate", EighteenthsController::class)->name("eighteenths");

//botezuri
Route::get("/botezuri", BaptismsController::class)->name("baptisms");

//nunti
Route::get("/nunti", WeddingsController::class)->name("weddings");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
