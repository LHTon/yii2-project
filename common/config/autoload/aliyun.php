<?php

// 全局阿里云配置
return [
    'aliyun' => [
        'key'      => env('ALIYUN_KEY'),
        'secret'   => env('ALIYUN_SECRET'),
        'endpoint' => env('ALIYUN_ENDPOINT'),
        'bucket'   => env('ALIYUN_BUCKET'),
    ],
    // OSS域，用以取代阿里云自带的域(cpscomcn-app.oss-cn-beijing.aliyuncs.com)
    'ossdomain' => 'https://img.app.cps.com.cn',
];


