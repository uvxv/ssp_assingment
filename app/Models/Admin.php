<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'admin_id';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'admin_id', 'admin_id');
    }

}
