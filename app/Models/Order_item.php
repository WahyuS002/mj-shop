<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    public $fillable = ['product_id'];
    public $timestamps = FALSE;

    public function itemOrders()
    {
        return $this->belongsTo(Order::class);
    }
}
