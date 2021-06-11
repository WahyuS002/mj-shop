<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_shipping_address extends Model
{
    use HasFactory;

    public $fillable = ['city_id', 'full_name', 'phone_number', 'address', 'notes'];
    public $timestamps = FALSE;

    public function orderAddress()
    {
        return $this->belongsTo(Order::class);
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
