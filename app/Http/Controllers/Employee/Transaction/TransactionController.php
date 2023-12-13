<?php

namespace App\Http\Controllers\Employee\Transaction;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Selling_unit;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $license_key = session()->get('license_key');
        // dd($request->get('search'));
        $get_product = Product::whereHas('employee.admin.client', function ($query) use ($license_key) {
            $query->where('license_key', $license_key);
        })->when($request->get('search') ?? false, function ($q, $search) {
            return $q->where('barcode', 'LIKE', "%$search%");
        })->get();

        // dd(in_array('2', session()->get('cart_product')));
        return view('employee.transaksi', ["product" => $get_product]);
    }

    public function test(Request $request)
    {

        $license_key = session()->get('license_key');
        $customer_kode = $request->kode;

        if ($customer_kode != '') {
            $check_customer = Customer::where('customer_code', $customer_kode)
                ->whereHas('employee.admin.client', function ($query) use ($license_key) {
                    $query->where('license_key', $license_key);
                })->exists();
            if (!$check_customer) return redirect()->route('checkout_product_page')->with('error', 'Data Member Tidak Ditemukan');
        }


        $cart = session()->get('cart_product');

        $data_transaction_list = [];
        foreach ($cart as $product) {
            $get_selling_unit = Selling_unit::where('id', $request['sel_unit_' . $product])->first();
            $price = $get_selling_unit->price;
            $qty = $request['qty_' . $product];
            $total = $price * $qty;
            $push = [
                'selling_unit_id' => $get_selling_unit->id,
                'price' => $get_selling_unit->price,
                'qty' => $request['qty_' . $product],
                'total_price' => $total
            ];


            array_push($data_transaction_list, $push);
        }
    }

    public function submit_checkbox_product(Request $request)
    {
        $data_check_box = $request->input('product');

        session()->put('cart_product', $data_check_box);


        return redirect()->route('checkout_product_page');
    }

    public function checkout_product_page()
    {
        $license_key = session()->get('license_key');
        $cart = session()->get('cart_product');
        if (!$cart) return redirect()->route('transaction_page')->with('error', 'Pilih setidaknya 1 produk');
        $check_license_key = Product::whereHas('employee.admin.client', function ($query) use ($license_key) {
            $query->where('license_key', $license_key);
        })->get();
        if (!$check_license_key) return redirect()->route('transaction_page')->with('error', 'Cart Tidak Ada Di Client Ini');

        $get_selling_unit = Product::whereIn('id', $cart ?? [])
            ->get();


        $loaded = $get_selling_unit->load('selling_units.unit');


        return view('employee.transaction.checkout-transaksi', ["selling_unit" => $loaded]);
    }

    public function submit_checkout_product(Request $request){
        $license_key = session()->get('license_key');
        $customer_kode = $request->kode;

        if ($customer_kode != '') {
            $check_customer = Customer::where('customer_code', $customer_kode)
                ->whereHas('employee.admin.client', function ($query) use ($license_key) {
                    $query->where('license_key', $license_key);
                })->exists();
            if (!$check_customer) return redirect()->route('checkout_product_page')->with('error', 'Data Member Tidak Ditemukan');
        }


        $cart = session()->get('cart_product');

        $data_transaction_list = [];
        foreach ($cart as $product) {
            $get_selling_unit = Selling_unit::where('id', $request['sel_unit_' . $product])->first();
            $price = $get_selling_unit->price;
            $qty = $request['qty_' . $product];
            $total = $price * $qty;
            $push = [
                'selling_unit_id' => $get_selling_unit->id,
                'price' => $get_selling_unit->price,
                'qty' => $request['qty_' . $product],
                'total_price' => $total
            ];


            array_push($data_transaction_list, $push);
        }
    }

    public function confirmation_checkout_page(){

    }

    public function cancel_transaction()
    {
        session()->forget('cart_product');

        return redirect()->route('transaction_page')->with('success', 'Anda Membatalkan Transaksi');
    }
}
