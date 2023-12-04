<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\licenseController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/loginsuperadmin', [AuthController::class, 'login'])->name('superadmin.login');
Route::post('/superadmin/login', [AuthController::class, 'login_super_admin'])->name('login_super_admin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//

Route::prefix('/superadmin/dashboard')->middleware(['superadmin.auth'])->group(function () {
    Route::prefix('/client')->group(function () {
        Route::get('/', [ClientController::class, 'show_data_client'])->name('superadmin.client');
        Route::get('/add', [ClientController::class, 'add_data_client'])->name('superadmin.add_data_client');
        Route::get('/{id}/update', [ClientController::class, 'update_data_client'])->name('superadmin.update_data_client');
        Route::get('/{id}/update/expired', [ClientController::class, 'update_expired_client'])->name('superadmin.update_expired_client');
        Route::post('/submitadddata', [ClientController::class, 'submit_add_data_client'])->name('superadmin.submit_add_data_client');
        Route::post('/submitupdatedata/{id}', [ClientController::class, 'submit_update_data_client'])->name('superadmin.submit_update_data_client');
        Route::post('/submitupdateexpired/{id}', [ClientController::class, 'submit_update_expired_client'])->name('superadmin.submit_update_expired_client');
    });
});

Route::get('/', [licenseController::class, 'index'])->name('adminEmployeeLogin');
Route::post('/checklicensekey', [licenseController::class, 'check_license_key'])->name('check_license_key');


