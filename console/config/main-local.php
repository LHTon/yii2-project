<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],

    'components' => [
        // 中安网网站数据库
        'db_cps' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => env('DB_DSN4'),
            'username'    => env('DB_USERNAME4'),
            'password'    => env('DB_PASSWORD4'),
            'charset'     => env('DB_CHARSET4'),
            'tablePrefix' => env('DB_TABLE_PREFIX4'),
        ],

        // 中安网网站数据库
        'db_haigui' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => env('DB_DSN5'),
            'username'    => env('DB_USERNAME5'),
            'password'    => env('DB_PASSWORD5'),
            'charset'     => env('DB_CHARSET5'),
            'tablePrefix' => env('DB_TABLE_PREFIX5'),
        ],

        // 安博会
        'db_cpse' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => env('DB_DSN6'),
            'username'    => env('DB_USERNAME6'),
            'password'    => env('DB_PASSWORD6'),
            'charset'     => env('DB_CHARSET6'),
            'tablePrefix' => env('DB_TABLE_PREFIX6'),
        ],
    ]
];
