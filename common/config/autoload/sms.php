<?php

// 全局短信配置
return [
    // 短信验证码
    'sms1'         => [
        'account'  => env('SMS_USER1'),
        'password' => env('SMS_PWD1'),
        'url'      => env('SMS_URL1'),
    ],

    // 营销短信
    'sms2'         => [
        'account'  => env('SMS_USER2'),
        'password' => env('SMS_PWD2'),
        'url'      => env('SMS_URL2'),
    ],

    // 短信验证码有效时间
    'expire.sms'   => 600,
    'expire.email' => 600,
];


