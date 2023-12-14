<?php

namespace App\Http\Controllers\Employee\Transaction;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Customer;
use Faker\Provider\Uuid;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\Selling_unit;
use Illuminate\Http\Request;
use App\Models\Transaction_list;
use App\Http\Controllers\Controller;
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
                })->get();
            if (count($check_customer) == 0) return redirect()->route('checkout_product_page')->with('error', 'Data Member Tidak Ditemukan');
            session()->put('customer_code', $customer_kode);
        }


        $cart = session()->get('cart_product');
        $final_total_price = [];
        $data_transaction_list = [];
        
        foreach ($cart as $product) {
            $get_selling_unit = Selling_unit::where('id', $request['sel_unit_' . $product])->first();
            $price = $get_selling_unit->price;
            $qty = $request['qty_' . $product];
            if($get_selling_unit->stock < $qty) return redirect()->route('checkout_product_page')->with('error', "Stock Tidak Boleh kurang dari $qty");
            $total = $price * $qty;
            $push = [
                'selling_unit_id' => $get_selling_unit->id,
                'price' => $get_selling_unit->price,
                'quantity' => $request['qty_' . $product],
                'total_price' => $total
            ];
            
            
            array_push($data_transaction_list, $push);
            array_push($final_total_price, $total);
            session()->push('cart_selling_unit', $get_selling_unit->id);
        }
       
        $cart_selling_unit = session()->get('cart_selling_unit');
        // dd($cart_selling_unit);
        $total_all_price = array_sum($final_total_price);
        $employee_id = session()->get('auth_id');
        $get_milisecond = Carbon::now()->valueOf();
        $no_ref = intval($get_milisecond.rand(1,9999));
        $data_transaction = [
            "customer_id" =>  $check_customer[0]->id ?? null,
            "employee_id" => $employee_id,
            "no_ref" => $no_ref,
            "total_price" => $total_all_price,
        ];

        $transaction = Transaction::create($data_transaction);
        $transaction->transaction_lists()->createMany($data_transaction_list);
        $transaction_id = $transaction->id;
        session()->put('transaction_id', $transaction_id);
        return redirect()->route('confirmation_checkout_page');
        
    }

    public function confirmation_checkout_page(){
        $transaction_id = session()->get('transaction_id');
        $get_selling_unit_id = session()->get('cart_selling_unit');
        $transaction_list = Transaction_list::whereIn('selling_unit_id', $get_selling_unit_id)->where('transaction_id', $transaction_id)->get();
        $selling_unit = $transaction_list->load('selling_unit.unit', 'selling_unit.product', 'transaction.customer');
        
        // dd($selling_unit);
        return view('employee.transaction.confirmation-checkout', ['transaction_list' => $selling_unit]);
    }

    public function submit_payment(Request $request){
        
        $pay = $request->bayar;
        $change = $request->kembali;
        $total_price = $request->total_price;
        $check = $pay < $total_price;
        if($check) return redirect()->route('confirmation_checkout_page')->with('error', 'Jumlah yang dibayarkan kurang dari total harga');

        $transaction_id = session()->get('transaction_id');
        $transaction_input = [
            "pay" => $pay,
            "change" => $change
        ];
        Transaction::where('id', $transaction_id)->update($transaction_input);
        Transaction_list::where('transaction_id', $transaction_id);
        return redirect()->route('success_payment');
    }

    public function success_payment(){
        $transaction_id = session()->get('transaction_id');
        $transaction = Transaction::where('id', $transaction_id)->get();
        $another_data = $transaction->load('employee.admin.client', 'customer', 'transaction_lists.selling_unit.product', 'transaction_lists.selling_unit.unit');
        $Date = Carbon::now()->toDateString();
        $time = Carbon::now()->setTimezone('Asia/Jakarta')->toTimeString();
        session()->forget('cart_selling_unit');
        session()->forget('customer_code');
        session()->forget('transaction_id');
        session()->forget('cart_product');
        // dd($another_data);
        return view('employee.transaction.success', [
            "another_data" => $another_data, 
            "date" => $Date,
            "time" => $time

        ]);
    }

    public function back_to_home_transaction(){
        session()->forget('cart_selling_unit');
        session()->forget('customer_code');
        session()->forget('transaction_id');
        session()->forget('cart_product');

        return redirect()->route('transaction_page');
    }

    public function back_to_check_product(){
        session()->forget('customer_code');
        $transaction_id = session()->get('transaction_id');
        Transaction::find($transaction_id)->delete();
        session()->forget('transaction_id');
        return redirect()->route('checkout_product_page')->with('error', "Anda Membatalkan Transaksi");
    }

    public function cancel_transaction()
    {
        session()->forget('cart_product');
        session()->forget('cart_selling_unit');

        return redirect()->route('transaction_page')->with('success', 'Anda Membatalkan Transaksi');
    }
}
