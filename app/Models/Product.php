<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_create', 'id');
    }


    public function selling_units()
    {
        return $this->hasMany(Selling_unit::class, 'product_id', 'id');
    }
}
