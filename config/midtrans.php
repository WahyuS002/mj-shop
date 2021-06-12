<?php
return [
    'sandbox' => [
        'merchat_id' => env('MIDTRANS_SANDBOX_MERCHANT_ID'),
        'client_key' => env('MIDTRANS_SANDBOX_CLIENT_KEY'),
        'server_key' => env('MIDTRANS_SANDBOX_SERVER_KEY')
    ],
    'production' => [
        'merchat_id' => env('MIDTRANS_PRODUCTION_MERCHANT_ID'),
        'client_key' => env('MIDTRANS_PRODUCTION_CLIENT_KEY'),
        'server_key' => env('MIDTRANS_PRODUCTION_SERVER_KEY')
    ]
];
