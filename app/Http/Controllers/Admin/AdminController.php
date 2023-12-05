<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        
        return view('admin.dashboard');
    }


    public function profile_update(){
        $dataAdmin = Admin::with('client')
        ->join('clients', 'admins.client_id', '=', 'clients.id')
        ->where('name', session()->get('nameAdmin') )
        ->get(['admins.name', 'clients.client_name', 'admins.username']);
        // dd($dataAdmin);

        return  view('admin.profile', compact('dataAdmin'));
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
}
