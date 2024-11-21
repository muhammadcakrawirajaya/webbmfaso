<?php

use Illuminate\Support\Facades\Route;


// TELKOM
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



// ***** -------------------------------- TELKOM -------------------------------- *****
Route::get('/telkom', function () {
    return view('telkom.menus.dashboard.dashboard');
})->name('telkom');

Route::get('/telkom/menu2', function () {
    return view('telkom.menus.dashboard.menu2');
})->name('telkomDashboardMenu2');

Route::get('/telkom/manageData', function () {
    return view('telkom.menus.manageData.menu1');
})->name('telkomManageDataMenu1');

Route::get('/telkom/tools', function () {
    return view('telkom.menus.toolsMenu.menu1');
})->name('telkomToolsMenu1');

// ***** -------------------------------- TELKOMSEL -------------------------------- *****

// dashboard - Telkomsel
Route::get('/telkomsel', function () {
    return view('telkomsel.menus.dashboard.dashboard');
})->name('telkomsel');

Route::get('/telkomsel/menu2', function () {
    return view('telkomsel.menus.dashboard.menu2');
})->name('dashboardMenu2');

Route::get('/menu3', function () {
    return view('telkomsel.menus.dashboard.menu3');
})->name('dashboardMenu3');

Route::get('/menu4', function () {
    return view('telkomsel.menus.dashboard.menu4');
})->name('dashboardMenu4');

Route::get('/menu5', function () {
    return view('telkomsel.menus.dashboard.menu5');
})->name('dashboardMenu5');

Route::get('/menu6', function () {
    return view('telkomsel.menus.dashboard.menu6');
})->name('dashboardMenu6');

Route::get('/menu7', function () {
    return view('telkomsel.menus.dashboard.menu7');
})->name('dashboardMenu7');



// Manage Data - Telkomsel
Route::get('/telkomsel/manageData', function () {
    return view('telkomsel.menus.manageData.menu1');
})->name('manageDataMenu1');

Route::get('/telkomsel/manageData/menu2', function () {
    return view('telkomsel.menus.manageData.menu2');
})->name('manageDataMenu2');

Route::get('/telkomsel/manageData/menu3', function () {
    return view('telkomsel.menus.manageData.menu3');
})->name('manageDataMenu3');

Route::get('/telkomsel/manageData/menu4', function () {
    return view('telkomsel.menus.manageData.menu4');
})->name('manageDataMenu4');

Route::get('/telkomsel/manageData/menu5', function () {
    return view('telkomsel.menus.manageData.menu5');
})->name('manageDataMenu5');

Route::get('/telkomsel/manageData/menu6', function () {
    return view('telkomsel.menus.manageData.menu6');
})->name('manageDataMenu6');

Route::get('/telkomsel/manageData/userManagement', function () {
    return view('telkomsel.menus.manageData.userManagement');
})->name('userManagement');



// Tools - Telkomsel
Route::get('/telkomsel/toolsMenu1', function () {
    return view('telkomsel.menus.toolsMenu.menu1');
})->name('toolsMenu1');

Route::get('/telkomsel/toolsMenu2', function () {
    return view('telkomsel.menus.toolsMenu.menu2');
})->name('toolsMenu2');
