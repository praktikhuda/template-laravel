<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-simple');
});

Route::get('/finance', function () {
    return view('dashboard');
});
