<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_list extends Model
{
    use HasFactory;

    protected $table = 'transaction_lists';

    protected $guarded = ['id'];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function selling_unit()
    {
        return $this->belongsTo(Selling_unit::class, 'selling_unit_id', 'id');
    }
}
