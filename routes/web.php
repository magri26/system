<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets', function () {
    return "Aqui se mostraran los tickets";
});