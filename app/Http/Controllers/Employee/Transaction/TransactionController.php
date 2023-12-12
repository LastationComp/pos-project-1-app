<?php

namespace App\Http\Controllers\Employee\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $license_key = session()->get('license_key');

        $get_product = Product::whereHas('employee.admin.client', function($query) use($license_key){
            $query->where('license_key', $license_key);
        })->get();

        return view('employee.transaksi', ["product" => $get_product]);
    }
    
    public function submit_checkbox_product(){

        return redirect()->route('checkout_product_page');
    }

    public function checkout_product_page(){
        
        return view('employee.transaction.checkout-transaksi');
    }
}
