<?php

return [
    'components' => [
        // 数据库cps_app 业务数据库
        'db'     => [
            'class'       => 'yii\db\Connection',
            'dsn'         => env('DB_DSN'),
            'username'    => env('DB_USERNAME'),
            'password'    => env('DB_PASSWORD'),
            'charset'     => env('DB_CHARSET'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
        ],
    ],
];
