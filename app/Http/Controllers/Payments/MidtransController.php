<?php

namespace App\Http\Controllers\Payments;

use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function getSnapToken()
    {
        Config::$serverKey = config('midtrans.production.server_key');
        Config::$isProduction = true;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 12000,
            )
        );

        $snapToken = Snap::getSnapToken($params);

        dd($snapToken);
    }
}
