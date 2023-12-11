<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function profile_update($username)
    {
        $data = Employee::select('employee_code', 'name', 'avatar_url')->where('employee_code', $username)->get();

        if (!$data)
            return abort(403);
        // dd($data);

        return view('employee.settings.setting', compact('data'));
    }

    public function submit_profile_update(Request $request, $username)
    {
        $validated = $request->validate([
            "name" => ["min:4"],
        ]);
        $update_employee = Employee::where("employee_code", $username)->first();
        $old_avatar = $update_employee->avatar_url;
        if ($request->new_password && $request->reenter_password && $request->old_password) {
            if ($request->new_password != $request->reenter_password)
                return redirect()->route('profile_update', $username)->with('error', 'New Password not match with Reenter Password');
            if (!Hash::check($request->old_password, $update_employee->pin))
                return redirect()->route('profile_update', $username)->with('error', 'Old Password not same');
        }


        $newNameImage = null;
        //upload image
        if ($request->hasFile('profile_image')) {
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $getProfileImage = $request->file('profile_image')->getClientOriginalName();
            // dd($extension);
            $newNameImage = md5($getProfileImage . Carbon::now()) . '.' . $extension;
            $path = public_path('/images');
            $request->file('profile_image')->move($path, $newNameImage);
            session()->put('avatar_url', $newNameImage);
        }


        $update_data = [
            "name" => $validated['name'],
            "pin" => Hash::make($request->new_password),
            "avatar_url" => $newNameImage
        ];

        if (!$request->new_password)
            unset($update_data['pin']);
        if (!$request->hasFile('profile_image'))
            unset($update_data['avatar_url']);


        session()->put('employeeName', $validated['name']);

        $data_updated = $update_employee->update($update_data);
        if($data_updated && $old_avatar != 'default.png' ){
            File::delete(public_path('/images'). '/' . $old_avatar);
        }

        return redirect()->route('profile_update', $username)->with('success', 'success to change profile for employee');
    }
}
