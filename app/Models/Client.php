<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $guarded = ['id'];
    protected $dates = ['expired_at'];


    public function super_admin()
    {
        return $this->belongsTo(super_admin::class, 'super_admin_id' , 'id');
    }


    public function admin()
    {
        return $this->hasOne(Admin::class, 'client_id','id');
    }
}
