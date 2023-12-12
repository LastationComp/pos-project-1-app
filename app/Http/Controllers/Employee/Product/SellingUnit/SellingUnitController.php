<?php

namespace App\Http\Controllers\Employee\Product\SellingUnit;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Selling_unit;
use App\Models\Unit;
use Illuminate\Http\Request;

class SellingUnitController extends Controller
{
    public function index($id_product){
        $get_product = Product::find($id_product);
        if(!$get_product) return abort(403);
        $get_selling_unit = Selling_unit::where('product_id', $id_product)
        ->join('units', 'selling_units.unit_id', '=', 'units.id')
        ->get(['selling_units.*', 'units.name']);
        return view('employee.crud-produk.selling_unit.edit', ["selling_unit" => $get_selling_unit, "product" => $get_product]);
    }

    public function edit_data_selling_unit( $id_selling_unit){
        $get_selling_unit = Selling_unit::where('id', $id_selling_unit)->first();
        $get_product = Product::find($get_selling_unit->product_id);
        $get_unit = Unit::whereDoesntHave('selling_units.product', function($query) use($get_selling_unit){
            $query->where('id', $get_selling_unit->product_id);
        })->get();
        return view('employee.crud-produk.selling_unit.editdata', ["product" => $get_product, "selling_unit" => $get_selling_unit, "unit" => $get_unit]);

    }

    public function submit_edit_data_selling_unit(Request $request, $product_id, $selling_unit_id){
        $validator = $request->validate([
            "stock" => ["required"],
            "price" => ["required"]
        ]);

        $input_data = [
            "unit_id" => $request->smallest_unit,
            "is_smallest" => $request->is_smallest == 'true' ? true : false,
            "stock" => $validator['stock'],
            "price" => $validator['price']
        ];

        $product = Product::find($product_id);
        $check_selling_unit = $product->selling_units()->where('unit_id', $request->smallest_unit )->exists();
        if($check_selling_unit) return redirect()->route('edit_data_selling_unit', $selling_unit_id)->with('error', 'Selling Unit Sudah Terdaftar');

        if($request->is_smallest == 'true'){
            Selling_unit::where('product_id', $product_id)
            ->where('unit_id', '!=', $request->smallest_unit)
            ->update(["is_smallest" => false]);
        }

        $get_selling_unit = Selling_unit::where('id', $selling_unit_id)
        ->where('product_id', $product_id)->update($input_data);

        return redirect()->route('table_selling_unit', $product->id)->with('success', 'Data Sukses Ditambahkan');
    }
}
