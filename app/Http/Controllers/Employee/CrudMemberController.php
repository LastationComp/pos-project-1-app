<?php

namespace App\Http\Controllers\Employee;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Builder;

class CrudMemberController extends Controller
{
    public function index(){
        $data = Customer::whereHas('employee', function ($query) {
            $query->whereHas('admin', function ($query){
                $query->whereHas('client', function ($query){
                    $query->where('license_key', session()->get('license_key'));
                });
            });
        })->get();
        return view('employee.member', ['data' => $data]);
    }

    public function add_data_member(){

        return view('employee.crud-member.create');
    }

    public function submit_add_data_member(Request $request){


        $validator = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'phone' => ['required']

        ]);


        $customer_data = Customer::whereHas('employee', function ($query) {
            $query->whereHas('admin', function ($query){
                $query->whereHas('client', function ($query){
                    $query->where('license_key', session()->get('license_key'));
                });
            });
        })->orderBy('customer_code', 'desc')->first();
        $check_customer_data = $customer_data->customer_code ?? '';
        $get_first_clientcode = session()->get('client_code');

        $splitCustomerCode = explode('_',$check_customer_data) ?? [];
        $client_code_early = $get_first_clientcode . '_';
        $numbercode = $splitCustomerCode[1] ?? 0;
        $client_code_final = intval($numbercode) + 1;
        $customer_code = $client_code_early . str_pad(strval($client_code_final), 4, '0', STR_PAD_LEFT);
        

        $data = [
            "customer_code" => $customer_code,
            "name" => $validator['name'],
            "email" => $validator['email'],
            "phone" => $validator['phone'],
            "point" => 0
        ];

        $employee = Employee::find(session()->get('auth_id'));
        $employee->customers()->create($data);

        return redirect()->route('member_page')->with('success', 'Data Member Successfully Inserted');
    }

    public function submit_update_data_employee($customer_code){
        $data = Customer::where('customer_code', $customer_code)->first();
        if(!$data) return abort(403);

        return view ('employee.crud-member.edit', compact('data'));
    }

    public function submit_update_data_member_employee(Request $request, $customer_code){

        $validator = $request->validate([
            "point" => ['required'],
            "name" => ["required", 'not_regex:(^\s+|[<>/;:"#$%^&*(){}`?]|\s{2,})'],
            "phone" => [],
            "email" => ['required', 'email:dns']
        ]);

        $customer_update = Customer::where('customer_code', $customer_code)->first();
        if(!$customer_update) return abort(403);

        $input_data = [
            "point" => $validator['point'],
            "name" => $validator['name'],
            "phone" => $validator['phone'],
            "email" => $validator['email']
        ];

        $customer_update->update($input_data);

        return redirect()->route('member_page')->with('success', 'Data Members Succesfully Updated');

    }

    public function delete_data_member_employee($customer_code){
        Customer::where('customer_code', $customer_code)->delete();

        return redirect()->route('member_page')->with('success', 'Data Members Succesfully Deleted');
    }
}
