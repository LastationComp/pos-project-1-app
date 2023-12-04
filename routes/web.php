<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware groupW. Make something great!
|
*/
Route::get('/login', function() { return view('login'); });
Route::get('/list-product', function() { return view('list-product'); });

// login 1
Route::get('/login-pin', function() { return view('login-1.login-pin'); });
Route::get('/login-scan', function() { return view('login-1.login-scan'); });

// login 2
Route::get('/login-pin-2', function() { return view('login-2.login-pin'); });
Route::get('/login-scan-2', function() { return view('login-2.login-scan'); });

Route::get('/success-popup', function() { return view('success'); });
Route::get('/checkout', function() { return view('checkout'); });
Route::get('/transaction', function() { return view('transaction'); });


Route::get('/loginsuperadmin', [AuthController::class, 'login'])->name('login');
Route::post('/superadmin/login', [AuthController::class, 'login_super_admin'])->name('login_super_admin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//

Route::prefix('/superadmin/dashboard')->middleware(['superadmin.auth'])->group(function () {
    Route::prefix('/client')->group(function () {
        Route::get('/', [ClientController::class, 'show_data_client'])->name('client');
        Route::get('/add', [ClientController::class, 'add_data_client'])->name('add_data_client');
        Route::get('/{id}/update', [ClientController::class, 'update_data_client'])->name('update_data_client');
        Route::get('/{id}/update/expired', [ClientController::class, 'update_expired_client'])->name('update_expired_client');
        Route::post('/submitadddata', [ClientController::class, 'submit_add_data_client'])->name('submit_add_data_client');
        Route::post('/submitupdatedata/{id}', [ClientController::class, 'submit_update_data_client'])->name('submit_update_data_client');
        Route::post('/submitupdateexpired/{id}', [ClientController::class, 'submit_update_expired_client'])->name('submit_update_expired_client');
    });
});


