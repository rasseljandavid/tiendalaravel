<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'secret'    => env('PAYPAL_SECRET'),
    ],

    'megaventory' => [
        'key' => env('MEGAVENTORY_API')
    ],

    'smsapikey' => [
        'key' => env('SMS_APIKEY')
    ],

    'smscpnumber' => [
        'number' => env('SMS_CP_NUMBER')
    ],

    'chikka' => [
        'id' => env('CHIKKA_API_ID'),
        'key' => env('CHIKKA_API_KEY'),
        'resto' => env('CHIKKA_RESTO_NUMBER'),
        'logistic' => env('CHIKKA_LOGISTIC_NUMBER'),
        'shortcode' => env('CHIKKA_SHORTCODE')
    ],
];
