<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = ['id'];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    public function customers()
    {
        return $this->hasMany(Customer::class, 'employee_create', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'employee_create', 'id');
    }


    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'employee_id', 'id');
    }
}
