<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order_shipping extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public function courier()
    {
        return $this->hasOne(Shipping_courier::class, 'id', 'courier_id');
    }
}
