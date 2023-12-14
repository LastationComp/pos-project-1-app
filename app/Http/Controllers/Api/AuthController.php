<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\super_admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientAddRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginSuperAdminRequest;
use App\Http\Requests\RegisterSuperAdminRequest;

class AuthController extends Controller
{
    public function apiSuccess($data, $message = null, $code = 200){
        return response()->json([
            "data" => $data,
        ], $code);
    }

    public function apiError($errors, $code, $message = null){
        return response()->json([
            "errors" => $errors,
            "message" => $message
        ], $code);
    }

    public function login() {
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if($checkauth) return abort(403);

        return view('superAdmin.login');
    }

    public function logout(){
        Session::flush();
       
        return redirect()->route('superadmin.login')->with('success', 'Anda Berhasil Logout');
    }

    public function register_super_admin(RegisterSuperAdminRequest $request){
        $validated = $request->validated();

        $super_admin = super_admin::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return $this->apiSuccess([
            'success' => true,
        ],'Register Successfully');
    }

    public function login_super_admin(LoginSuperAdminRequest $request){
        $validated = $request->validated();
        $user = DB::selectOne('SELECT * FROM pos_users WHERE username = ?', [$validated['username']]);
        // $user = super_admin::where('username', $validated['username'])->first();
        if(!$user) return redirect()->route('superadmin.login')->with('error','Error saat masuk');
        if(!Hash::check($validated['password'],$user->password)) return redirect()->route('superadmin.login')->with('error','Error saat masuk');
        session()->put('auth_id' , $user->id);
        session()->put('roles', $user->roles);
        return redirect()->route('superadmin.client');
    }

    public function login_admin_employee(Request $request) {
        if (strval($request->role) == 'employee'){
            $check_client = Client::where('license_key', session()->get('license_key'))->first();
            $check_admin = $check_client->admin()->first();
            $check_setting = $check_admin->setting()->get(['settings.emp_can_login', 'settings.shop_open', 'settings.shop_close', 'settings.emp_can_create', 'settings.emp_can_update', 'settings.emp_can_delete']);
            $time = Carbon::now()->setTimezone('Asia/Jakarta');
            $timeNow= $time->toTimeString();
            $date = $time->toDateString();
            $shop_open = $check_setting[0]->shop_open;
            $shop_close = $check_setting[0]->shop_close;
            
            // dd($timeNow);
            $validate_time = $shop_open < $timeNow && $timeNow < $shop_close;
            if (!$validate_time) return redirect()->route('adminEmployeeLogin')->with('error', "Toko Sudah Tutup! Silahkan Login Besok");
            if ($check_setting[0]->emp_can_login == false) return redirect()->route('adminEmployeeLogin')->with('error', "akses masuk anda di nonaktifkan! \n mohon hubungi admin anda");
            session()->put('emp_can_create', $check_setting[0]->emp_can_create);
            session()->put('emp_can_update', $check_setting[0]->emp_can_update);
            session()->put('emp_can_delete', $check_setting[0]->emp_can_delete);
        }
        $validator = Validator::make ($request->all(), [
            "username" => ['required','not_regex:(^\s+|[<>/;:"#$%^&*(){}`?]|\s{2,})'],
            "password" => ["required","min:8"]
        ]);

        $validated = $validator->validated();

        $user = DB::selectOne('SELECT * FROM pos_users WHERE BINARY username = ? AND roles = BINARY ? AND license_key = ? AND is_active = ?' , [$validated['username'], $request->role,session()->get('license_key'), true]);
        // dd($user);
        if(!$user) return redirect()->route('adminEmployeeLogin')->with('error', 'Akun Anda Tidak Terdaftar');
        if(!Hash::check($validated['password'],$user->password)) return redirect()->route('adminEmployeeLogin')->with('error', 'Akun Anda Tidak Terdaftar');
        // dd($request->role);
        if($user->roles == 'admin') {
            session()->put('role', $user->roles);
            session()->put('auth_id', $user->id);
            session()->put('nameAdmin', $user->name);
            session()->put('adminUsername', $user->username);
            return redirect()->route('adminEmployeeLogin')->with('success', 'anda login sebagai admin');
        }else if ($user->roles == 'employee'){
            
            session()->put('role', $user->roles);
            session()->put('auth_id', $user->id);
            session()->put('employee_code', $user->username);
            session()->put('employeeName', $user->name);
            session()->put('avatar_url', $user->avatar);
            return redirect()->route('employee')->with('success', 'anda login sebagai employee');
        }else {
            return redirect()->route('adminEmployeeLogin')->with('error', 'test');
        }
    }
}
