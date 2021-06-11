<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_cancellation extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'reason'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
