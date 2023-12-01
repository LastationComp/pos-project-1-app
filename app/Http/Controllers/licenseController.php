<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;

class licenseController extends Controller
{
    public function index()
    {
        if (session()->has('license_key')) {
            $license_key = Client::where('license_key', session()->get('license_key'))->first();
            if (!$license_key)return redirect()->route('adminEmployeeLogin')->with('error', 'The License Key you entered is not registered');
            $expired = ($license_key->expired_at <= Carbon::now()) || ($license_key->is_active == false);
            if ($expired) {
                session()->flush();
                session()->invalidate();
                session()->regenerateToken();
                return redirect()->route('adminEmployeeLogin')->with('error', 'Sorry, your time has expired');
            }
        }

        return view('admin.loginAdmin');
    }

    public function check_license_key(Request $request)
    {
        $date = Carbon::now();
        $validated = $request->validate([
            'license_key' => 'required'
        ]);

        $license_key = Client::where('license_key', $validated['license_key'])->first();
        if (!$license_key) return redirect()->route('adminEmployeeLogin')->with('error', 'The License Key you entered is not registered');
        $expired = ($license_key->expired_at <= Carbon::now()) || ($license_key->is_active == false);
        // dd($expired);
        if ($expired) return redirect()->route('adminEmployeeLogin')->with('error', 'The License Key you entered is already expired, please contact the owner of website');
        session()->put('license_key', $license_key->license_key);
        session()->put('client_code', $license_key->client_code);
        return redirect()->route('adminEmployeeLogin')->with('success', 'License Key has been entered successfully');
    }
}
