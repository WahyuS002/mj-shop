<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function method()
    {
        return $this->hasOne(Payment_method::class);
    }

    public function paypal()
    {
        return $this->hasMany(Paypal_payment::class);
    }
}
