<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FixingController;
use App\Http\Controllers\licenseController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\TestingDBController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestingAdminController;
use App\Http\Controllers\SuperAdmin\UnitController;
use App\Http\Controllers\TestingEmployeeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\CrudMemberController;
use App\Http\Controllers\Employee\Product\CrudProductController;
use App\Http\Controllers\Employee\Transaction\TransactionController;
use App\Http\Controllers\Employee\HistoryTransaction\HistoryController;
use App\Http\Controllers\Employee\Product\SellingUnit\SellingUnitController;

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



// ## end of ROUTE Alfa

// problem route
Route::post('/submit_checkbox_product', function(){ return 'submit_checkbox_product'; })->name('submit_checkbox_product');
Route::get('/employee_logout', [FixingController::class, '/logout'])->name('employee_logout');
Route::post('/delete_data_product', function(){ return 'delete_data_product'; })->name('delete_data_product');
// problem route end of

Route::get('/loginsuperadmin', [AuthController::class, 'login'])->name('superadmin.login');
Route::post('/superadmin/login', [AuthController::class, 'login_super_admin'])->name('login_super_admin');

Route::prefix('/superadmin')->middleware(['superadmin.auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('superadmin.logout');
    Route::prefix('dashboard/client')->group(function () {
        Route::get('/', [ClientController::class, 'show_data_client'])->name('superadmin.client');
        Route::get('/add', [ClientController::class, 'add_data_client'])->name('superadmin.add_data_client');
        Route::get('/{id}/update', [ClientController::class, 'update_data_client'])->name('superadmin.update_data_client');
        Route::get('/{id}/update/expired', [ClientController::class, 'update_expired_client'])->name('superadmin.update_expired_client');
        Route::post('/submitadddata', [ClientController::class, 'submit_add_data_client'])->name('superadmin.submit_add_data_client');
        Route::post('/submitupdatedata/{id}', [ClientController::class, 'change_status_client'])->name('change_status_client');
        Route::post('/submitupdateexpired/{id}', [ClientController::class, 'submit_update_expired_client'])->name('superadmin.submit_update_expired_client');
    });
    Route::prefix('dashboard/unit')->group(function () {
        Route::get('/', [UnitController::class, 'index'])->name('dashboard_unit');
        Route::get('/add', [UnitController::class, 'add_data_unit'])->name('add_data_unit');
        Route::post('/submitadddata', [UnitController::class, 'submit_add_data_unit'])->name('submit_add_data_unit');
        Route::get('{id}/edit', [UnitController::class, 'edit_data_unit'])->name('edit_data_unit');
        Route::post('{id}/submitedit', [UnitController::class, 'submit_edit_unit'])->name('submit_edit_unit');
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

Route::prefix('/employee')->middleware('employee.auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('transaction_page');
    })->name('employee');
    Route::middleware(['CheckTransaction.auth'])->group(function (){
        Route::prefix('/member')->group(function () {
            Route::get('/', [CrudMemberController::class, 'index'])->name('member_page');
            Route::get('/add', [CrudMemberController::class, 'add_data_member'])->name('add_data_member');
            Route::post('/submitadd', [CrudMemberController::class, 'submit_add_data_member'])->name('submit_add_data_member');
            Route::get('/{customer_code}/update', [CrudMemberController::class, 'update_data_member'])->name('update_data_member');
            Route::post('/{customer_code}/submitupdate', [CrudMemberController::class, 'submit_update_data_member_employee'])->name('submit_update_data_member_employee');
            Route::post('/{customer_code}/deletedata', [CrudMemberController::class, 'delete_data_member_employee'])->name('delete_data_member_employee');
        });
    });
    Route::middleware(['CheckTransaction.auth'])->group(function () {
        Route::prefix('/product')->group(function () {
            Route::get('/', [CrudProductController::class, 'index'])->name('product_page');
            Route::get('/addproduct', [CrudProductController::class, 'add_data_product'])->name('add_data_product');
            Route::post('/submitaddproduct', [CrudProductController::class, 'submit_add_data_product'])->name('submit_add_data_product');
            Route::get('/{id}/updatesellingunit', [CrudProductController::class, 'add_selling_unit'])->name('add_selling_unit');
            Route::post('/{id}/submitupdatesellingunit', [CrudProductController::class, 'submit_add_selling_unit'])->name('submit_add_selling_unit');
            Route::get('/{id_product}/updateproduct', [CrudProductController::class, 'update_data_product'])->name('update_data_product');
            Route::post('/{id_product}/submitupdatedata', [CrudProductController::class, 'submit_update_data_product'])->name('submit_update_data_product');
            Route::post('/{id_product}/deleteproduct', [CrudProductController::class, 'delete_data_product'])->name('delete_data_product');
            Route::prefix('/sellingunit')->group(function () {
                Route::get('/{id_product}', [SellingUnitController::class, 'index'])->name('table_selling_unit');
                Route::get('/{id_selling_unit}/edit', [SellingUnitController::class, 'edit_data_selling_unit'])->name('edit_data_selling_unit');
                Route::post('/{product_id}/{selling_unit_id}/submitedit', [SellingUnitController::class, 'submit_edit_data_selling_unit'])->name('submit_edit_data_selling_unit');
                Route::post('/{product_id}/{selling_unit_id}/delete', [SellingUnitController::class, 'delete_selling_unit'])->name('delete_selling_unit');
            });
        });
    });
    Route::prefix('/transaction')->group(function () {
        Route::middleware(['CheckTransaction.auth'])->group(function () {
            Route::get('/', [TransactionController::class, 'index'])->name('transaction_page');
            Route::post('/gotocheckout', [TransactionController::class, 'submit_checkbox_product'])->name('submit_checkbox_product');
            Route::get('/checkout', [TransactionController::class, 'checkout_product_page'])->name('checkout_product_page');
            Route::get('/cancel', [TransactionController::class, 'cancel_transaction'])->name('cancel_transaction');
            Route::post('/submitcheckout', [TransactionController::class, 'submit_checkout_product'])->name('submit_checkout_product');
        });
        Route::middleware(['transaction.auth'])->group(function () {
            Route::get('/confirmation_checkout', [TransactionController::class, 'confirmation_checkout_page'])->name('confirmation_checkout_page');
            Route::get('/backtocheckproduct', [TransactionController::class, 'back_to_check_product'])->name('back_to_check_product');
            Route::post('/submitpayment', [TransactionController::class, 'submit_payment'])->name('submit_payment');
            Route::get('/payment-success', [TransactionController::class, 'success_payment'])->name('success_payment');
        });
        Route::get('returntohome', [TransactionController::class, 'back_to_home_transaction'])->name('back_to_home_transaction');
    });
    Route::prefix('/history')->group(function () {
        Route::get('/', [HistoryController::class, 'index'])->name('history_page');
        Route::get('/{id}', [HistoryController::class, 'detail_history_transaction'])->name('detail_history_transaction');
    });
    Route::get('/logout', [EmployeeController::class, 'employee_logout'])->name('employee_logout');
    Route::get('/{username}/profile', [EmployeeController::class, 'profile_update'])->name('profile_update_employee');
    Route::post('/{username}/updateprofile', [EmployeeController::class, 'submit_profile_update'])->name('submit_profile_update_employee');
});
