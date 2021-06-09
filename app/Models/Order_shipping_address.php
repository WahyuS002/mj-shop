<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_shipping_address extends Model
{
    use HasFactory;

    public $fillable = ['full_name', 'phone_number', 'address', 'notes'];
    public $timestamps = FALSE;

    public function orderAddress()
    {
        return $this->belongsTo(Order::class);
    }
}
