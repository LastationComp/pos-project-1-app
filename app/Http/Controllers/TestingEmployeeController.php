<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;

class TestingEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->get('role') == 'employee')
        {
            $check_client = Client::where('license_key', session()->get('license_key'))->first();
            $check_admin = $check_client->admin()->first();
            $check_setting = $check_admin->setting()->get(['settings.shop_open', 'settings.shop_close']);
            $time = Carbon::now()->setTimezone('Asia/Jakarta');
            $timeNow= $time->toTimeString();
            $shop_open = $check_setting[0]->shop_open;
            $shop_close = $check_setting[0]->shop_close;
            $validate_time = $shop_open < $timeNow && $timeNow < $shop_close;
            if(!$validate_time){
                session()->flush();
                session()->invalidate();
                session()->regenerateToken();
                return redirect()->route('adminEmployeeLogin')->with('error', 'Sorry, the shop already close');
            }
        }

        return view('employee.transaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function beli( Request $request ) {
        $list_obat = [
            [
                'kode' => 'OBT1614120001',
                'nama' => 'Sangobion',
                'stok' => 4,
                'catatan' => 'Sangobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya',
            ],

            [
                'kode' => 'OBT1614120002',
                'nama' => 'Nyanyobion',
                'stok' => 9,
                'catatan' => 'Nyanyobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya',
            ],

            [
                'kode' => 'OBT1614120003',
                'nama' => 'Nganyobion',
                'stok' => 15,
                'catatan' => 'Ngayobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya',
            ],
        ];

        

        foreach( $list_obat as $lo ) {
            if( array_search($kode, $lo) ) {
                $obat = $lo;
            }
        }

        $cart = session()->get('cart', []);

        if( isset($cart[$kode]) ) {
            $cart[$kode]['jumlah']++;
        } else {
            $cart[$kode] = [
                'kode' => $obat['kode'],
                'nama' => $obat['nama'],
                'stok' => $obat['stok'],
                'catatan' => $obat['catatan'],
                'jumlah' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect('employee/cart');
    }

    public function cart() {

        return view('employee.checkout-transaksi');
    }

    public function hapus($kode) {

        $cart = session()->get('cart');

        if ( isset($cart[$kode]) ) {
            unset($cart[$kode]);
            session()->put('cart', $cart);
        }

        return redirect('cart');
    }

    public function batal() {

        session()->forget('cart');

        return redirect('/employee');
    }

    public function tambah($kode) {

        $cart = session()->get('cart');
        $cart[$kode]['jumlah']++;

        session()->put('cart', $cart);

        return redirect('employee/cart');
    }

    public function kurang($kode) {

        $cart = session()->get('cart');

        if ( $cart[$kode]['jumlah'] > 1 ) {
            $cart[$kode]['jumlah']--;
        } else {
            unset($cart[$kode]);
        }

        // kode buatan sendiri

        if( $cart == [] ) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        // buatan sendiri

        return redirect('employee/cart');
    }

    public function checkout() {

        $data = [];

        foreach (session('cart') as $key => $value) {
            $data = [
                'kode' => $value['kode'],
                'nama' => $value['nama'],
                'jumlah' => $value['jumlah'],
            ];

        }

        return $data;

        session()->forget('cart');

        return redirect('/');
    }

    // ---2-2
    public function data_produk() {
        return view('employee.data-produk');
    }

    public function member() {
        
    }

    public function riwayat_penjualan() {
        return view('employee.riwayat-penjualan');
    }

    public function laporan_stok() {
        return 'laporan stok';
    }
}