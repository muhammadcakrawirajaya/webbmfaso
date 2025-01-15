<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DashboardBGESController;
use App\Http\Controllers\FeedbackPICDataController;
use App\Http\Controllers\LogDataController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SoDataController;
use App\Http\Controllers\StatusKendalaDataController;
use App\Http\Controllers\StoDataController;
use App\Http\Controllers\UicDataController;
use App\Models\FeedbackPIC;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
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
    Route::resource('/Dashboard', DashboardBGESController::class)->names('telkomsel');

    Route::resource('/UploadExel', OrderController::class)->names('dashboardMenu2');
    Route::post('/UploadExel', [OrderController::class, 'preview'])->name('dashboardMenu2.preview');
    Route::post('/UploadExel/store', [OrderController::class, 'store'])->name('dashboardMenu2.store');

    // Route::resource('/MasterData', MasterController::class)->names('dashboardMenu3');
    Route::get('/MasterData', [MasterController::class, 'index'])->name('dashboardMenu3.index');
    Route::post('/MasterData', [MasterController::class, 'store'])->name('dashboardMenu3.store');
    Route::post('/MasterData/multiEdit', [MasterController::class, 'multiEdit'])->name('dashboardMenu3.multiEdit');
    Route::post('/MasterData/multiDelete', [MasterController::class, 'multiDelete'])->name('dashboardMenu3.multiDelete');
    Route::get('/MasterData/exportOrders', [MasterController::class, 'export'])->name('dashboardMenu3.export');


    Route::resource('/CheckUpdate', CheckController::class)->names('dashboardMenu4');
    Route::post('/CheckUpdate', [CheckController::class, 'preview'])->name('dashboardMenu4.preview');
    Route::post('/CheckUpdate/store', [CheckController::class, 'store'])->name('dashboardMenu4.store');

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
    Route::resource('/ManageData/LogData', LogDataController::class)->names('manageDataMenu1');
    Route::resource('/ManageData/So', SoDataController::class)->names('manageDataMenu2');
    Route::resource('/ManageData/Sto', StoDataController::class)->names('manageDataMenu3');
    Route::get('/ManageData/Sto/confirm-delete/{id}', [StoDataController::class, 'confirmDestroy'])->name('sto.confirmDestroy');
    Route::resource('/ManageData/Uic', UicDataController::class)->names('manageDataMenu4');
    Route::resource('/ManageData/Feedbackpic', FeedbackPICDataController::class)->names('manageDataMenu5');
    Route::get('/ManageData/Feedbackpic/confirm-delete/{id}', [FeedbackPICDataController::class, 'confirmDestroy'])->name('pic.confirmDestroy');
    Route::resource('/ManageData/StatusKendala', StatusKendalaDataController::class)->names('manageDataMenu6');
    Route::resource('/ManageData/UserManagement', ManageUserController::class)->names('userManagement');



    // Tools - Telkomsel
    Route::get('/telkomsel/toolsMenu1', function () {
        return view('telkomsel.menus.toolsMenu.menu1');
    })->name('toolsMenu1');

    Route::get('/telkomsel/toolsMenu2', function () {
        return view('telkomsel.menus.toolsMenu.menu2');
    })->name('toolsMenu2');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
