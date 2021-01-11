<?php

//$setting=app(App\Settings::class);
//
//return [
//    'secret' => settings('google_recapcha_secret_key',''),
//    'sitekey' => settings('google_recapcha_site_key', ''),
//    'options' => [
//        'timeout' => 30,
//    ],
//];


return [
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    'options' => [
        'timeout' => 30,
    ],
];
