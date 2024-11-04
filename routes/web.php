<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menus.sales.salesIndex');
})->name('sales');

Route::get('/analytics', function () {
    return view('menus.analytics.analyticsIndex');
})->name('analytics');

