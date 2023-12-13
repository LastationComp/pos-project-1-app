<?php

namespace App\Http\Controllers\Employee\HistoryTransaction;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index(){
        $license_key = session()->get('license_key');
        $transaksi = Transaction::whereHas('employee.admin.client', function($query) use($license_key){
            $query->where('license_key', $license_key);
        })->get();
        $another_data_transaction = $transaksi->load('customer');
        
        return view ('employee.history_transaction.riwayat-penjualan', ["transaction" => $another_data_transaction]);
    }

    public function detail_history_transaction($id){
        $license_key = session()->get('license_key');
        $transaksi = Transaction::whereHas('employee.admin.client', function($query) use($license_key){
            $query->where('license_key', $license_key);
        })->get();
        $another_data_transaction = $transaksi->load('customer');
        $transaction = Transaction::where('id', $id)->get();
        $another_data = $transaction->load('employee.admin.client', 'customer', 'transaction_lists.selling_unit.product', 'transaction_lists.selling_unit.unit');
        $get_time_date = explode(" ", $another_data_transaction[0]->updated_at->setTimezone('Asia/Jakarta'));
        $date = $get_time_date[0];
        $time = $get_time_date[1];
        

        return view('employee.history_transaction.detail-riwayat-penjualan', 
        ["transaction_detail" => $another_data , 
        "transaction" => $another_data_transaction,
        "time" => $time,
        "date" => $date
    ]);
    }
}
