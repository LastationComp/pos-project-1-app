<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling_unit extends Model
{
    use HasFactory;

    protected $table = 'selling_units';

    protected $guarded = ['id'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }


    public function transaction_lists()
    {
        return $this->hasMany(Transaction_list::class, 'selling_unit_id', 'id');
    }
}
