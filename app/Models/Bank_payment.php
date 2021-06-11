<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_payment extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    public $fillable = ['bank_id', 'sender_name', 'bank_name', 'account_number', 'transfer_amount'];

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
