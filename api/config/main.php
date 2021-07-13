<?php

use api\modules\v1\Module;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'layout' => false,
    'modules' => [
        'v1' => [
            'class' => Module::class
        ],
        'v2' => [
            'class' => 'api\modules\v2\Module'
        ]
    ],
    'components' => [
        // 用户组件
        'user' => [
            'class'           => 'yii\web\User',
            'identityClass'   => 'api\models\User',
            'enableAutoLogin' => false,  // 开启自动登录
            'enableSession'   => false,  // 关闭session
            'loginUrl'        => null,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        // 请求组件
        'request' => [
            // 'csrfParam' => '_csrf-backend',
            'class' => 'common\core\Request',
            'baseUrl' => Yii::getAlias('@apiUrl'),
        ],
        // 响应组件
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON,
        ],
        'errorHandler' => [
            'class' => 'common\core\ErrorHandler',
        ],

        'urlManager' => [
            'enablePrettyUrl' => env('API_PRETTY_URL', true),
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => require __DIR__ . '/route.php',
        ],

    ],
    // 默认在Request前(请求前)绑定事件
    'on beforeRequest' => [common\components\BindEvent::className(), 'bind'],
    'params' => $params,
];
