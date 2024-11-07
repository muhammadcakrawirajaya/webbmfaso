<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menus.dashboard.dashboard');
})->name('dashboard');

Route::get('/order', function () {
    return view('menus.dashboard.order');
})->name('order');

Route::get('/crypto', function () {
    return view('menus.dashboard.crypto');
})->name('crypto');

Route::get('/crypto2', function () {
    return view('menus.dashboard.cryptov2');
})->name('crypto2');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/form', function () {
    return view('menus.form.inputText');
})->name('form');

Route::get('/inputGroup', function () {
    return view('menus.form.inputGroup');
})->name('inputGroup');

Route::get('/manageUser', function () {
    return view('menus.manageUser.manageUser');
})->name('manageUser');
