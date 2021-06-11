<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Payment extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public function method()
    {
        return $this->hasOne(Payment_method::class, 'id', 'payment_method_id');
    }

    public function paypal()
    {
        return $this->hasOne(Paypal_payment::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank_payment::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentStatus()
    {
        return $this->hasOne(Payment_status::class, 'id', 'status');
    }
}
