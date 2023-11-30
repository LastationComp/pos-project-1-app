<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\super_admin;
use Illuminate\Http\Request;
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
        $user = super_admin::where('username', $validated['username'])->first();
        if(!$user) return redirect('/')->with('error','Error saat masuk');
        if(!Hash::check($validated['password'],$user->password)) return redirect('/')->with('error','Error saat masuk');
        session()->put('auth_id' , $user->id);
        return redirect('/client');
    }

    public function show_data_client(){
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if(!$checkauth) return redirect('/')->with('error','kamu tidak ada akses');

        $data = Client::all();

        return view ('superAdmin.clientdata', compact ('data'));
    }

    public function add_data_client(){
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if(!$checkauth) return redirect('/')->with('error','kamu tidak ada akses');

        return view ('superAdmin.adddataclient');
    }

    public function submit_add_data_client(ClientAddRequest $request){
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if(!$checkauth) return redirect('/')->with('error','kamu tidak ada akses');
        $validated = $request->validated();

        $date = Carbon::now();
        $date->addDays($validated['expired_at']);
        $date->format('Y-m-d');


        $data = [
            'super_admin_id'=> $checkauth->id,
            'license_key'=> $validated['license_key'],
            'client_name'=> $validated['client_name'],
            'client_code'=> $validated['client_code'],
            'is_active'=> true,
            'expired_at' => $date
        ];

        Client::create($data);

        return redirect('/client')-> with('success','Adding Data Successfully');
    }

    public function update_data_client($id){
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if(!$checkauth) return redirect('/')->with('error','kamu tidak ada akses');

        $data = Client::find($id);

        return view ('superAdmin.updatedataclient', compact('data'));

    }

    public function submit_update_data_client (ClientAddRequest $request, $id){
        $checkauth = super_admin::where('id',session()->get('auth_id'))->first();
        if(!$checkauth) return redirect('/')->with('error','kamu tidak ada akses');
        $validated = $request->validated();

        $latestDate = Client::find($id)->latest()->first();
        $latestDate->get(['expired_at']);
        // dd($latestDate);
        if(!$validated['expired_at'] == 0){
            $date = $date = Carbon::create($latestDate->expired_at);
            $date->addDays($validated['expired_at']);
            $date->format('Y-m-d');
        } else {
            $date = Carbon::create($latestDate->expired_at);
        }


        $inputData = [
            'super_admin_id'=> $checkauth->id,
            'license_key'=> $validated['license_key'],
            'client_name'=> $validated['client_name'],
            'client_code'=> $validated['client_code'],
            'is_active'=> true,
            'expired_at' => $date
        ];

        $data = Client::find($id);
        $data->update($inputData);


        return redirect('/client')-> with('success','Updating Data Successfully');

    }
}
