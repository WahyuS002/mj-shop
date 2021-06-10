<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paypal_payer extends Model
{
    use HasFactory;

    public $fillable = ['payer_id', 'method', 'status', 'email', 'first_name', 'last_name'];
    public $timestamps = FALSE;
}
