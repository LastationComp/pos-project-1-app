<?php

namespace App\Http\Controllers\Employee\Product;

use App\Models\Selling_unit;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function add_data_product(){

        $data = Unit::all();

        return view('employee.crud-produk.create', ["unit" => $data]);
    }

    public function submit_add_data_product(Request $request){

        $validator = $request->validate([
            "name" => ['required'],
            "kode" => ['required'],
            "catatan" => ['required'],
            "smallest_unit" => ["required"],
            "stock" => ["required"],
            "price" => ["required"]
        ]);

        $data_product_insert = [
            "product_name" => $validator['name'],
            "barcode" => $validator['kode'],
            "catatan_obat" => $validator['catatan']
        ];

        $employee = Employee::find(session()->get('auth_id'));
        $create_product = $employee->products()->create($data_product_insert);

        $data_selling_unit = [
            "unit_id" => $validator['smallest_unit'],
            "stock" => $validator['stock'],
            "price" => $validator['price'],
            "is_smallest" => true
        ];

        $create_product->selling_units()->create($data_selling_unit);

        return redirect()->route('product_page')->with('success', 'Berhasil Menambahkan Data Product');
    }

    public function add_selling_unit($id){
        $get_product = Product::find($id);
        $get_unit = Unit::all();

        return view('employee.crud-produk.addsellingunit', ['product' => $get_product, 'unit' => $get_unit]);
    }

    public function submit_add_selling_unit(Request $request, $id){

        $validator = $request->validate([
            'smallest_unit' => ['required'],
            "stock" => ['required'],
            "price" => ['required']
        ]);


        $product = Product::find($id);
        $check_selling_unit = $product->selling_units()->where('unit_id', $validator['smallest_unit'] )->exists();
        if($check_selling_unit) return redirect()->route('add_selling_unit', $id)->with('error', 'Selling Unit Sudah Terdaftar');

        $input_selling_unit = [
            "product_id" => $id,
            "unit_id" => $validator['smallest_unit'],
            "is_smallest" => false,
            "stock" => $validator['stock'],
            "price" => $validator['price']
        ];

        Selling_unit::create($input_selling_unit);

        return redirect()->route('product_page')->with('success', 'Selling Unit Sukses Ditambah');


    }

    public function update_data_product($id_product) {
        $get_product = Product::find($id_product);
        $get_unit = Unit::all();
        return view ('employee.crud-produk.edit', ["product" => $get_product, "unit" => $get_unit]);
    }

    public function submit_update_data_product(Request $request, $id_product){
        $validator = $request->validate([
            "name" => ['required'],
            "catatan" => ['required'],
        ]);

        $update_product = Product::find($id_product);

        $input_data = [
            "product_name" => $validator['name'],
            "catatan_obat" => $validator['catatan']
        ];

        $update_product->update($input_data);

        return redirect()->route('product_page')->with('success', 'Berhasil Mengubah Data Product');
    }
}
