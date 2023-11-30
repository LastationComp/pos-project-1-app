<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $guarded = ['id'];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }


    public function setting()
    {
        return $this->hasOne(Settings::class, 'admin_id','id');
    }


    public function employees()
    {
        return $this->hasMany(Employee::class, 'admin_id','id');
    }
}
