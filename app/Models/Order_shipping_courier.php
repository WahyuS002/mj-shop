<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_shipping_courier extends Model
{
    use HasFactory;

    public $fillable = ['courier_id', 'province_id', 'city_id', 'service', 'cost', 'estimation_day'];
    public $timestamps = FALSE;

    public function courier()
    {
        return $this->hasOne(Shipping_courier::class, 'id', 'courier_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
