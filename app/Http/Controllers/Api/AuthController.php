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

        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
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
        $user = DB::selectOne('SELECT * FROM pos_user WHERE username = ?', [$validated['username']]);
        // $user = super_admin::where('username', $validated['username'])->first();
        if(!$user) return redirect()->route('superadmin.login')->with('error','Error saat masuk');
        if(!Hash::check($validated['password'],$user->password)) return redirect('/')->with('error','Error saat masuk');
        session()->put('auth_id' , $user->id);
        session()->put('roles', $user->role);
        return redirect()->route('superadmin.client');
    }

    
}
