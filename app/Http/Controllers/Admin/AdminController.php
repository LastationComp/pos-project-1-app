<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index(){
        $dataEmployee= Employee::where('admin_id', session()->get('auth_id'))
        ->get(['employee_code', 'name', 'is_active']);

        return view('admin.dashboard', compact('dataEmployee'));
    }


    public function profile_update($username){
        $dataAdmin = Admin::with('client')
        ->join('clients', 'admins.client_id', '=', 'clients.id')
        ->where('username', $username )
        ->get(['admins.name', 'clients.client_name', 'admins.username']);
        // dd($dataAdmin);
        if(count($dataAdmin) == 0) return abort(403);

        return  view('admin.profile', compact('dataAdmin'));
    }

    public function submit_profile_update(Request $request, $username){
        $validator = $request->validate([
        "new_password" => ["required", "min:8"],
        "reenter_password" => ["required", "min:8"],
        "old_password" => ["required", "min:8"]]);

        $update_admin = Admin::where('username', $username)->first();
        if($validator["new_password"] != $validator["reenter_password"]) return redirect()->route('profile_update', $username)->with('error', 'Password Baru Yang Anda Masukkan Tidak Sama');
        if(!Hash::check($validator["old_password"], $update_admin->pin) ) return redirect()->route('profile_update', $username)->with('error', 'Password Lama Anda tidak sama');

        $data = [
            "pin" => Hash::make($validator["reenter_password"])
        ];

        $update_admin->update($data);
        return redirect()->route('profile_update', $username)->with('success', 'Password Anda Berhasil Diperbarui');
    }

    public function settings_admin_page($username){
        $dataSetting = Settings::with('admin')
        ->join('admins', 'settings.admin_id', '=', 'admins.id')
        ->where('admins.username', $username)
        ->get(['settings.emp_can_login', 'settings.emp_can_create', 'settings.emp_can_update', 'settings.emp_can_delete', 'admins.name', 'settings.shop_open', 'settings.shop_close']);
        // dd($dataSetting);
        if(count($dataSetting) == 0) return abort(403);

        return view('admin.setting', [
            "dataSetting" => $dataSetting,
            "username" => $username
        ]);
    }

    public function submit_update_setting_admin(Request $request, $username) {
        $emp_can_login = $request->emp_can_login ? true : false;
        $emp_can_create = $request->emp_can_create ? true : false;
        $emp_can_update = $request->emp_can_update ? true : false;
        $emp_can_delete = $request->emp_can_delete ? true : false;
        $shop_open = $request->shop_open;
        $shop_close = $request->shop_close;

        $dataInput = [
            "emp_can_login" => $emp_can_login,
            "emp_can_create" => $emp_can_create,
            "emp_can_update" => $emp_can_update,
            "emp_can_delete" => $emp_can_delete,
            "shop_open" => $shop_open,
            "shop_close" => $shop_close
        ];

        Settings::with('admin')->join('admins', 'settings.admin_id', '=', 'admins.id')
        ->where('admins.username', $username)
        ->update($dataInput);

        return redirect()->route('settings_admin_page', $username)->with('success', 'Setting Berhasil Dirubah');

    }

    public function add_data_employee (){
        return view('admin.crud_dataEmployee.create');
    }
    public function submit_add_data_employee(Request $request) {
        $client_code = "SK";
        $find_employeeCode = Employee::where("admin_id", session()->get('auth_id'))->orderBy('created_at', 'desc')->first();
        $last_employee_code = $find_employeeCode ?  explode('_', $find_employeeCode->employee_code) : [];
        $code = count($last_employee_code, 1) != 0 ? $last_employee_code[1] : 0;
        $final_employee_code = intval($code) + 1;
        $employee_Code = $client_code . '_' . str_pad(strval($final_employee_code), 4, "0", STR_PAD_LEFT);
        // dd($employee_Code);

        $validator = Validator::make($request->all(), [
            "name" => ['required','not_regex:(^\s+|[<>/;:"#$%^&*(){}`?]|\s{2,})'],
        ]);

        $insert_data = [
            "admin_id" => session()->get('auth_id'),
            "employee_code" => $employee_Code,
            "pin" => Hash::make('12345678'),

        ];

        Employee::create($insert_data);
    }

    public function admin_logout(){
        session()->flush();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success', 'logout successfully');
    }
}
