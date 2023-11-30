<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $guarded = ['id'];


    public function selling_units()
    {
        return $this->hasMany(Selling_unit::class, 'unit_id', 'id');
    }
}
