<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/dashboard', function() { return view('admin.dashboard'); });


Route::get('/loginsuperadmin', [AuthController::class, 'login'])->name('superadmin.login');
Route::post('/superadmin/login', [AuthController::class, 'login_super_admin'])->name('login_super_admin');


//

Route::prefix('/superadmin')->middleware(['superadmin.auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('superadmin.logout');
    Route::prefix('dashboard/client')->group(function () {
        Route::get('/', [ClientController::class, 'show_data_client'])->name('superadmin.client');
        Route::get('/add', [ClientController::class, 'add_data_client'])->name('superadmin.add_data_client');
        Route::get('/{id}/update', [ClientController::class, 'update_data_client'])->name('superadmin.update_data_client');
        Route::get('/{id}/update/expired', [ClientController::class, 'update_expired_client'])->name('superadmin.update_expired_client');
        Route::post('/submitadddata', [ClientController::class, 'submit_add_data_client'])->name('superadmin.submit_add_data_client');
        Route::post('/submitupdatedata/{id}', [ClientController::class, 'submit_update_data_client'])->name('superadmin.submit_update_data_client');
        Route::post('/submitupdateexpired/{id}', [ClientController::class, 'submit_update_expired_client'])->name('superadmin.submit_update_expired_client');
    });
});

Route::get('/', [licenseController::class, 'index'])->name('adminEmployeeLogin')->middleware(['adminemployee.auth']);
Route::post('/checklicensekey', [licenseController::class, 'check_license_key'])->name('check_license_key');
Route::post('/loginadminemployee', [AuthController::class, 'login_admin_employee'])->name('login_admin_employee');

Route::prefix('/admin/dashboard')->middleware(['admin.auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard_admin');
    Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
    Route::prefix('/profile')->group(function () {
        Route::get('/{username}', [AdminController::class, 'profile_update'])->name('profile_update');
        Route::post('/{username}/updateprofile', [AdminController::class, 'submit_profile_update'])->name('submit_profile_update');
    });
    Route::prefix('/settings')->group(function () {
        Route::get('/{username}', [AdminController::class, 'settings_admin_page'])->name('settings_admin_page');
        Route::post('/{username}/updatesetting', [AdminController::class, 'submit_update_setting_admin'])->name('submit_update_setting_admin');
    });
});


Route::get('/test', [AdminController::class, 'submit_add_data_employee']);