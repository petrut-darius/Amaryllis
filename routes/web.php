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
    return Inertia::render('Welcome'); //choose this over home
})->name("home");

/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::fallback(function () {
    return Inertia::render("Welcome");
});

//contact
Route::get("/contact", [ContactController::class, "create"])->name("contact.create");//static
Route::post("/contact", [ContactController::class, "store"])->name("contact.store");

//about us
Route::get("/despre-noi", function() {
    return Inertia::render("About");//static
})->name("about");

//livrare
Route::get("/livrari", function() {
    return Inertia::render("Delivery", [
        'reviews' => [
                [
                    "name" => "Carina Vermețan",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocLy4X6CWX2fA83-ZF53cbt81iNqjG-Veu_9NVmLL83rqYq9Xg=s200-c-rp-mo-ba2-br100",
                    "date" => "2026-04-16",
                    "rating" => 5,
                    "text" => "Excellent flower shop, very nice service and great bouqets"
                ],
                [
                    "name" => "Andreea Serediuc",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocLNS_gYM6aIOThmdZyoJWJ7JMx4R0ZM1qE9s8itn5_NQVaiCg=s200-c-rp-mo-br100",
                    "date" => "2026-04-13",
                    "rating" => 5,
                    "text" => "Un loc deosebit, unde pasiunea pentru flori se vede in fiecare buchet! Amabilitatea si profesionalismul la superlativ. Am găsit exact ce aveam nevoie pentru un eveniment special iar faptul ca in prima zi de Paști v-ați deplasat de acasa sa imi faceti ziua perfecta, spune multe! Recomand din toată inima!"
                ],
                [
                    "name" => "Florin Milasan",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocK7yZfmEq9e2FQiWWkWZg-MTrQ3qqxdJ9x_Y-qWYTSMhBHu_g=s200-c-rp-mo-br100",
                    "date" => "2026-03-09",
                    "rating" => 5,
                    "text" => "Super amabili!"
                ],
                [
                    "name" => "Feurdean Florin",
                    "photo" => "https://lh3.googleusercontent.com/a-/ALV-UjWqOfzULFZWuPhkVL2bFqyxtlHQSD8QEnIYTxWa3_jryEyc9X8=s200-c-rp-mo-br100",
                    "date" => "2026-03-08",
                    "rating" => 5,
                    "text" => "Recomand cu încredere top ♥️"
                ],
                [
                    "name" => "Gio Gogu",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocLhCbEribRBj-1ie1hzw7OBkIn2pVTJJLtl5lYYpi9rW_XHJQ=s200-c-rp-mo-br100",
                    "date" => "2026-01-18",
                    "rating" => 5,
                    "text" => "O locație deosebită în Târgu Mureș! Am primit un ajutor prețios de la o domnișoară foarte amabilă, care a creat acest buchet minunat. Florile sunt de calitate superioară, iar atmosfera din florărie este foarte primitoare. Cu siguranță voi reveni de fiecare dată când am nevoie de un cadou special"
                ],
                [
                    "name" => "Laura Popa",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocIhFWW9c8-elB0hW4PhcN9S2r08CyS4hpPoziKtnQIrf2XKPw=s200-c-rp-mo-br100",
                    "date" => "2026-01-31",
                    "rating" => 5,
                    "text" => "Am fost multumita de serviciile florariei. M-a interesat in mod special buchetele gata facute, am avut de unde alege, fiind multe facute. Domnisoara foarte amabila, draguta si deschisa. Am sa revin!"
                ],/*
                [
                    "name" => "Catalin Naipeanu",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocLhCbEribRBj-1ie1hzw7OBkIn2pVTJJLtl5lYYpi9rW_XHJQ=s200-c-rp-mo-br100",
                    "date" => "2026-01-24",
                    "rating" => 3,
                    "text" => "Scump al naiba!"
                ],*/
                [
                    "name" => "Pistu Sas",
                    "photo" => "https://lh3.googleusercontent.com/a-/ALV-UjUMN53bK7Px4LtEpc0paD2_1idBUwyGcUVT-ssVTpCLOs6IJ-w=s200-c-rp-mo-br100",
                    "date" => "2026-01-16",
                    "rating" => 5,
                    "text" => "Am fost deja câteva ori și mi sa părut drăguț magazinul o să mai revin"
                ],
                [
                    "name" => "Patience Pickachu",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocL3BTXBznTw_dMK1hZyT7YhZPFaTXXX9EDFEAWSRcoSECZBLOPN=s200-c-rp-mo-br100",
                    "date" => "2025-10-21",
                    "rating" => 5,
                    "text" => "Foarte frumos 🌸 multumesc doamna Corina! Un buchet super mare si frumos, pretul chiar decent, ma bucur ca i-am dat doamnei mana libera, se vede clar talentul si pasiunea dansei. Recomand cu drag 😊"
                ],
                [
                    "name" => "Mihai Pisica",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocLW_zYImvUnxu4mSJuBjdjD7GOlJ4u3azJlJcPfTX_4pxBykg=s200-c-rp-mo-br100",
                    "date" => "2025-09-19",
                    "rating" => 5,
                    "text" => "Un buchet cu flori superb. Am comandat buchetul de la 350 km de Tg Mures pentru cineva de acolo, livrare promptă, recomand cu toată încrederea."
                ],
                [
                    "name" => "Ioana Moldovan",
                    "photo" => "https://lh3.googleusercontent.com/a-/ALV-UjX5KH5QSiNZpQiQn_OV_IqRg3tDeWrTKgQHT83H0Rt9xakMxS0=s200-c-rp-mo-br100",
                    "date" => "2025-11-10",
                    "rating" => 5,
                    "text" => "O doamnă foarte drăguță, cu niște flori superbe, pentru orice fel de eveniment"
                ],
                [
                    "name" => "mehmet uzunurgan",
                    "photo" => "https://lh3.googleusercontent.com/a/ACg8ocI9WQPmic5WIpHwVVvVSkIApPTY6deQzhvmsYmQvcB_EdqZPe4=s200-c-rp-mo-br100",
                    "date" => "2026-02-19",
                    "rating" => 5,
                    "text" => "Türkiye'den aradım çok ilgili ve yardımcı oldu teşekkür ederim."
                ],
            ]
    ]);//static
})->name("delivery");

//galerie
Route::get("/galerie", function() {
    return Inertia::render("Gallery");//static
})->name("gallery");

//buchete - good
Route::get("/buchete", BouquetsController::class)->name("bouquets");

//evenimente
//Route::get("/evenimente", EventsController::class)->name("events");
Route::get("/evenimente", function() {
    return Inertia::render("Events");//static
})->name("events");


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