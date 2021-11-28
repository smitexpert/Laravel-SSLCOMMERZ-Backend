<?php

return [
    'api_domain' => 'https://sandbox.sslcommerz.com',
    'api_credential' => [
        'store_id' => 'fashi619f1a5e61484',
        'store_password' => 'fashi619f1a5e61484@ssl'
    ],
    'api_url' => [
        'make_payment' => '/gwprocess/v4/api.php'
    ],
    'backend' => [
        'success_url' => url('/').'/api/success',
        'fail_url' =>  url('/').'/api/fail',
        'cancel_url' =>  url('/').'/api/cancel',
        'ipn_url' =>  url('/').'/api/ipn',
    ],
    'frontend' => [
        'success_url' => 'http://localhost:3000/success',
        'fail_url' => 'http://localhost:3000/fail',
        'cancel_url' => 'http://localhost:3000/cancel',
    ]
];
