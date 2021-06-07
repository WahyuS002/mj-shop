<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_order_option extends Model
{
    use HasFactory;

    public $fillable = ['key', 'value'];
    public $timestamps = FALSE;

    public function productOrderOptions()
    {
        return $this->belongsTo(Product::class);
    }
}
