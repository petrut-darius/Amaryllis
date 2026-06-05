<?php

use Illuminate\Support\Facades\Route;

Route::get("/sitemap.xml", function() {
    return response()->view("sitemap.index")->header("Content-Type", "application/xml");
});

Route::get("/acasa.xml", function() {
    return response()->view("sitemap.home")->header("Content-Type", "application/xml");
});

Route::get("/buchete.xml", function() {
    return response()->view("sitemap.bouquets")->header("Content-Type", "application/xml");
});

Route::get("/aranjamente.xml", function() {
    return response()->view("sitemap.arrangements")->header("Content-Type", "application/xml");
});

Route::get("/aranjamente-funerare.xml", function() {
    return response()->view("sitemap.funeralArrangements")->header("Content-Type", "application/xml");
});

Route::get("/majorate.xml", function() {
    return response()->view("sitemap.eighteenths")->header("Content-Type", "application/xml");
});

Route::get("/botezuri.xml", function() {
    return response()->view("sitemap.baptisms")->header("Content-Type", "application/xml");
});

Route::get("/nunti.xml", function() {
    return response()->view("sitemap.weddings")->header("Content-Type", "application/xml");
});

Route::get("/evenimente.xml", function() {
    return response()->view("sitemap.events")->header("Content-Type", "application/xml");
});

Route::get("/flori-la-fir.xml", function() {
    return response()->view("sitemap.threads")->header("Content-Type", "application/xml");
});

Route::get("/despre-noi.xml", function() {
    return response()->view("sitemap.about")->header("Content-Type", "application/xml");
});

Route::get("/livrari.xml", function() {
    return response()->view("sitemap.delivery")->header("Content-Type", "application/xml");
});

Route::get("/galerie.xml", function() {
    return response()->view("sitemap.gallery")->header("Content-Type", "application/xml");
});

Route::get("/flori.xml", function() {
    return response()->view("sitemap.flowers")->header("Content-Type", "application/xml");
});

Route::get("/contact.xml", function() {
    return response()->view("sitemap.contact")->header("Content-Type", "application/xml");
});

Route::get("/newsletter.xml", function() {
    return response()->view("sitemap.newsletter")->header("Content-Type", "application/xml");
});