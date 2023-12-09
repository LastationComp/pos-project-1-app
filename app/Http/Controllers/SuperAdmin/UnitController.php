<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index() {
        $data = Unit::all();

        return view('superAdmin.units.dashboard_unit', compact('data'));
    }
    
    public function add_data_unit(){
        return view('superAdmin.units.addunit');
    }

    public function submit_add_data_unit(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'not_regex:(^\s+|[<>/;:"#$%^&*(){}`?]|\s{2,})']
        ]);

        $data = [
            'name' => $validated['name']
        ];
        
        Unit::create($data);

        return redirect()->route('dashboard_unit')->with('success', 'Data Unit Berhasil DiTambahkan');
    }

    public function edit_data_unit($id){
        $data = Unit::find($id);

        return view('superAdmin.units.editunit',compact('data') );
    }
}
