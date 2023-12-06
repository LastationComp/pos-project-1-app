<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\super_admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientAddRequest;
// use Illuminate\Support\Facades\Session;
// use App\Http\Requests\LoginSuperAdminRequest;
// use App\Http\Requests\RegisterSuperAdminRequest;

class ClientController extends Controller
{
    public function show_data_client(){

        $data = Client::all();

        return view ('superAdmin.clientdata', compact ('data'));
    }

    public function add_data_client(){

        return view ('superAdmin.adddataclient');
    }

    public function submit_add_data_client(ClientAddRequest $request){
        $validated = $request->validated();

        $checkClientCode = Client::where('client_code',$validated['client_code'])->first();
        if($checkClientCode) return redirect()->back()->with('error', 'clientcode sudah ada');

        $checkClientCode = Client::where('client_name',$validated['client_name'])->first();
        if($checkClientCode) return redirect()->back()->with('error', 'client name sudah ada');

        $date = Carbon::now();
        $date->addDays($validated['expired_at']);
        $date->format('Y-m-d');

        $licenseKey = Str::uuid() . mt_rand(1010,10101010);

        $data = [
            'super_admin_id'=> session()->get('auth_id'),
            'license_key'=> $licenseKey,
            'client_name'=> $validated['client_name'],
            'client_code'=> $validated['client_code'],
            'expired_at' => $date
        ];

        $client = Client::create($data);

        $dataAdmin = [
            'name' => "Admin " . $validated['client_name'],
            'username' => strtolower(preg_replace('/\s+/', '', $validated['client_name'])),
            'pin' => Hash::make('12345678')
        ];
        $admin = $client->admin()->create($dataAdmin);

        $dataSetting = [
            "emp_can_login" => true
        ];

        $admin->setting()->create($dataSetting);    

        return redirect()->route('superadmin.client')-> with('success','Adding Data Successfully');
    }

    public function update_data_client($id){

        $data = Client::find($id);

        return view ('superAdmin.updatedataclient', compact('data'));

    }

    public function submit_update_data_client (Request $request, $id){

        $validated = $request->validate(["client_name"=> "required",
        "client_code"=> "required",]);


        $inputData = [
            'super_admin_id'=> session()->get('auth_id'),
            'client_name'=> $validated['client_name'],
            'client_code'=> $validated['client_code'],
            
        ];

        $data = Client::find($id);
        $data->update($inputData);

        $dataAdmin = [
            'name' => "Admin " . $validated['client_name'],
            'username' => strtolower(preg_replace('/\s+/', '', $validated['client_name'])),
        ];

        $data->admin()->update($dataAdmin);


        return redirect()->route('superadmin.client')-> with('success','Updating Data Successfully');

    }

    public function update_expired_client($id){

        $data = Client::find($id);

        return view ('superAdmin.updateexpiredat', compact('data'));

    }

    public function submit_update_expired_client (Request $request, $id){


        $validated = $request->validate(['expired_at' => 'required']);
        $licenseKey = Str::uuid() . mt_rand(1010,10101010);

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

        $inputanData = [
            'license_key' => $licenseKey,
            'expired_at' => $date
        ];

        $data = Client::find($id);
        $data->update($inputanData);

        
        return redirect()->route('superadmin.client')  -> with('success','Updating Data Successfully');
    }
}