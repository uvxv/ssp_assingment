<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'product_id');
    }
}
