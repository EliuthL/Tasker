<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
}) -> name('home');

Route::get('/label', function () {
    return view('label');
}) -> name('label');

Route::get('/task', function () {
    return view('task');
}) -> name('task');
