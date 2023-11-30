<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('superAdmin.login');
});
Route::post('/loginsuperadmin', [AuthController::class,'login_super_admin'])->name('login_super_admin');
Route::get('/client', [AuthController::class,'show_data_client'])->name('client');
Route::get('/client/add', [AuthController::class,'add_data_client'])->name('add_data_client');
Route::post('/submitadddata', [AuthController::class,'submit_add_data_client'])->name('submit_add_data_client');
Route::get('/client/{id}/update', [AuthController::class,'update_data_client'])->name('update_data_client');
Route::post('/submitupdatedata/{id}', [AuthController::class,'submit_update_data_client'])->name('submit_update_data_client');