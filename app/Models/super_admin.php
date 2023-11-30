<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class super_admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'super_admins';

    protected $guarded = ['id'];

    /**
     * Get all of the comments for the super_admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class, 'super_admin_id', 'id');
    }
}
