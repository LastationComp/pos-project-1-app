<?php

namespace App\Http\Controllers\Employee\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CrudProductController extends Controller
{
    public function index(){
        $data = Product::whereHas('employee', function ($query) {
            $query->whereHas('admin', function ($query){
                $query->whereHas('client', function ($query){
                    $query->where('license_key', session()->get('license_key'));
                });
            });
        })->get();

        return view('employee.data-produk', compact('data'));
    }
}
