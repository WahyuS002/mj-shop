<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paypal_payment extends Model
{
    use HasFactory;

    public $fillable = ['rate', 'idr_price', 'usd_price', 'paypal_payment_id', 'state', 'paypal_cart_id'];
    public $timestamps = FALSE;

    public function payer()
    {
        return $this->hasOne(Paypal_payer::class);
    }
}
