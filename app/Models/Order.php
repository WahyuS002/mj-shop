<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function status()
    {
        return $this->hasOne(Order_status::class, 'id', 'status_id');
    }

    public function items()
    {
        return $this->hasMany(Order_item::class);
    }

    public function address()
    {
        return $this->hasOne(Order_shipping_address::class);
    }

    public function courier()
    {
        return $this->hasOne(Order_shipping_courier::class);
    }
}
