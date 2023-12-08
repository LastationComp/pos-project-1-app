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

    public function index(Request $request){
        $admin = Admin::find(session()->get('auth_id'));

        $dataEmployee= $admin->employees()->when($request->get('search') ?? false, function($q, $search) {
            return $q->where('name', 'LIKE', "%$search%");
        })
        ->get(['employee_code', 'name', 'is_active']);
        // dd($dataEmployee);

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
        $find_client_code = Client::with('admin')
        ->join('admins', 'clients.id', '=', 'admins.client_id')
        ->where('admins.id', session()->get('auth_id'))
        ->get('clients.client_code');

        $client_code = $find_client_code[0]->client_code;

        

        $find_employeeCode = Employee::where("admin_id", session()->get('auth_id'))->orderBy('created_at', 'desc')->first();
        $last_employee_code = $find_employeeCode ?  explode('_', $find_employeeCode->employee_code) : [];
        $code = count($last_employee_code, 1) != 0 ? $last_employee_code[1] : 0;
        $final_employee_code = intval($code) + 1;
        $employee_Code = $client_code . '_' . str_pad(strval($final_employee_code), 4, "0", STR_PAD_LEFT);
        // dd($employee_Code);

        $validator = $request->validate([
            "name" => ['required','not_regex:(^\s+|[<>/;:"#$%^&*(){}`?]|\s{2,})'],
        ]);

        $insert_data = [
            "admin_id" => session()->get('auth_id'),
            "employee_code" => $employee_Code,
            "pin" => Hash::make('12345678'),
            "name" => $validator['name'],
            "avatar_url" => "default.png",
            "is_active" => true

        ];

        

        Employee::create($insert_data);

        return redirect()->route('dashboard_admin')->with('success', 'Data Employee Berhasil Ditambahkan');
    }

    public function deactive_employee($employee_code){
        $employee_status = Employee::where('employee_code', $employee_code)
        ->first();
        if($employee_status->is_active == true){
            $change_status = [
                "is_active" => false
            ];

            $employee_status->update($change_status);

            return redirect()->route('dashboard_admin')->with('success', 'Status Employee Berhasil Di Ubah');
        }
        else if ($employee_status->is_active == false){
            $change_status = [
                "is_active" => true
            ];

            $employee_status->update($change_status);

            return redirect()->route('dashboard_admin')->with('success', "Status Employee Berhasil Di Ubah");
        }
    }
    public function admin_logout(){
        session()->flush();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success', 'logout successfully');
    }
}
