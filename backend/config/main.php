<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'zh-CN',

    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

    // 模块
    'modules' => [],

    // 默认路由
    'defaultRoute' => 'index',

    // 默认布局文件 优先级 控制器-》配置文件-》系统默认
    'layout' => 'main',

    // 组件
    'components' => [

        // 修改默认的request 组件
        'request' => [
            'class' => 'common\core\Request',
            'baseUrl' => Yii::getAlias('@backendUrl'),
//            'csrfParam' => '_csrf-backend',
        ],

        // 身份认证类 默认 yii\web\user,
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => true,
            // 默认登录Url
            'loginUrl' => ['login/login'],
            'identityCookie' => ['name' => '__admin_identity', 'httpOnly' => true],
            'idParam' => '__admin',
        ],

        // 数据库RBAC权限控制
        'authManager' => [
            'class' => 'common\core\rbac\DbManager'
        ],

        // 错误处理器
        'errorHandler' => [
            'errorAction' => 'public/error',
        ],

        // 链接管理
        'urlManager' => [
            'class' => 'common\core\UrlManager',
            'enablePrettyUrl' => env('BACKEND_PRETTY_URL', true), // 开启url规则
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        /**
         * 多语言管理，
         * 将“源语言”翻译成“目标语言”，必须使用\Yii::t('common','中文')，当源语言和目标语言相同时默认不翻译
         * common/messages中必须存在“目标语言(en-US)”文件夹，且对应语言文件中存在：'中文'=>'English'
         */
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'common' => 'common.php',
                        'backend' => 'backend.php',
                    ],
                ],
            ],
        ],

        /**
         * 这里要注意了，由于我使用的是模板自带的jQuery和bootstrap，所以这里就先清空系统的jQuery和bootstrap
         * 基本上所有的插件都是使用了yii\web\JqueryAsset，
         * 为了模板全局的js/css放在其他插件的前面，这里我设置了yii\web\JqueryAsset依赖backend\assets\AppAsset
         */
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [],
                    'depends' => [
                        'backend\assets\AppAsset'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => []
                ],
            ],
        ],
    ],

    /**
     * 该属性允许你用一个数组定义多个 别名 代替 Yii::setAlias()
     */
    'aliases' => [],

    'as rbac' => [
        'class' => 'backend\behaviors\RbacBehavior',
        'allowActions' => [
            // 不需要权限的检测
            'login/login', 'login/logout', 'public*', 'debug/*', 'gii/*', 'test/*'
        ]
    ],

    'params' => $params,
];
