<?php

use App\Http\Controllers\Employee\Product\SellingUnit\SellingUnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\licenseController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestingAdminController;
use App\Http\Controllers\SuperAdmin\UnitController;
use App\Http\Controllers\TestingDBController;
use App\Http\Controllers\TestingEmployeeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\CrudMemberController;
use App\Http\Controllers\Employee\Product\CrudProductController;

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

// ## ROUTE Alfa

// ON PROGRESS
Route::get('/test-db', [TestingDBController::class, 'index']);

// Route::get('/login', function() { return view('login'); })->name('login');
// Route::resource('/admin/dashboard', TestingAdminController::class);
// Route::get('/admin/dashboard/settings', [TestingAdminController::class, 'settings']);
// Route::get('/admin/dashboard/profile', [TestingAdminController::class, 'profile']);




// just tampilan
Route::get('/list-product', function () {
    return view('list-product');
});

// login 1
Route::get('/login-pin', function () {
    return view('login-1.login-pin');
});
Route::get('/login-scan', function () {
    return view('login-1.login-scan');
});

// login 2
Route::get('/login-pin-2', function () {
    return view('login-2.login-pin');
});
Route::get('/login-scan-2', function () {
    return view('login-2.login-scan');
});

Route::get('/success-popup', function () {
    return view('success');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/transaction', function () {
    return view('transaction');
});


Route::get('/loginsuperadmin', [AuthController::class, 'login'])->name('superadmin.login');
Route::post('/superadmin/login', [AuthController::class, 'login_super_admin'])->name('login_super_admin');

// ## end of ROUTE Alfa

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
    Route::prefix('dashboard/unit')->group(function () {
        Route::get('/', [UnitController::class, 'index'])->name('dashboard_unit');
        Route::get('/add', [UnitController::class, 'add_data_unit'])->name('add_data_unit');
        Route::post('/submitadddata', [UnitController::class, 'submit_add_data_unit'])->name('submit_add_data_unit');
        Route::get('{id}/edit', [UnitController::class, 'edit_data_unit'])->name('edit_data_unit');

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
    Route::prefix('/employee')->group(function () {
        Route::get('/add', [AdminController::class, 'add_data_employee'])->name('add_data_employee');
        Route::post('/submitadddataemployee', [AdminController::class, 'submit_add_data_employee'])->name('submit_add_data_employee');
        Route::post('/deactiveemployee/{employee_code}', [AdminController::class, 'deactive_employee'])->name('deactive_employee');
    });
});

Route::prefix('/employee')->middleware('admin.auth')->group(function(){
    Route::get('/', function(){ return redirect('employee/transaction'); })->name('employee');
    Route::prefix('/member')->group(function(){
        Route::get('/', [CrudMemberController::class, 'index'])->name('member_page');
        Route::get('/add', [CrudMemberController::class, 'add_data_member'])->name('add_data_member');
        Route::post('/submitadd', [CrudMemberController::class, 'submit_add_data_member'])->name('submit_add_data_member');
        Route::get('/{customer_code}/update', [CrudMemberController::class, 'submit_update_data_employee'])->name('submit_update_data_employee');
        Route::post('/{customer_code}/submitupdate', [CrudMemberController::class, 'submit_update_data_member_employee'])->name('submit_update_data_member_employee');
        Route::post('/{customer_code}/deletedata', [CrudMemberController::class, 'delete_data_member_employee'])->name('delete_data_member_employee');
    });
    Route::prefix('/product')->group(function() {
        Route::get('/', [CrudProductController::class, 'index'])->name('product_page');
        Route::get('/addproduct', [CrudProductController::class, 'add_data_product'])->name('add_data_product');
        Route::post('/submitaddproduct', [CrudProductController::class, 'submit_add_data_product'])->name('submit_add_data_product');
        Route::get('/{id}/updatesellingunit', [CrudProductController::class, 'add_selling_unit'])->name('add_selling_unit');
        Route::post('/{id}/submitupdatesellingunit', [CrudProductController::class, 'submit_add_selling_unit'])->name('submit_add_selling_unit');
        Route::get('/{id_product}/updateproduct', [CrudProductController::class, 'update_data_product'])->name('update_data_product');
        Route::post('/{id_product}/submitupdatedata', [CrudProductController::class, 'submit_update_data_product'])->name('submit_update_data_product');
        Route::prefix('/sellingunit')->group(function () {
            Route::get('/{id_product}', [SellingUnitController::class, 'index'])->name('table_selling_unit');
            Route::get('/{id_selling_unit}/edit', [SellingUnitController::class, 'edit_data_selling_unit'])->name('edit_data_selling_unit');
            Route::post('/{product_id}/{selling_unit_id}/submitedit', [SellingUnitController::class, 'submit_edit_data_selling_unit'])->name('submit_edit_data_selling_unit');
        });
    });
    Route::get('/{username}/profile', [EmployeeController::class, 'profile_update'])->name('profile_update_employee');
    Route::post('/{username}/updateprofile', [EmployeeController::class, 'submit_profile_update'])->name('submit_profile_update_employee');
    Route::get('/riwayat-penjualan', [TestingEmployeeController::class, 'riwayat_penjualan']);
    Route::get('/laporan-stok', [TestingEmployeeController::class, 'laporan_stok']);

    Route::get('/transaction', [TestingEmployeeController::class, 'index']);
    Route::post('/beli', [TestingEmployeeController::class, 'beli']);
    Route::get('/cart', [TestingEmployeeController::class, 'cart']);
    Route::get('/tambah/{kode}', [TestingEmployeeController::class, 'tambah']);
    Route::get('/kurang/{kode}', [TestingEmployeeController::class, 'kurang']);
    Route::get('/batal', [TestingEmployeeController::class, 'batal']);
});