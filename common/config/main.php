<?php
define('LOG_PATH', '/log/app.cps.com.cn');


$logfile = LOG_PATH.DIRECTORY_SEPARATOR.'api'.DIRECTORY_SEPARATOR.date('Y-m').DIRECTORY_SEPARATOR.date('Y-m-d').'.log';


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    // 源语言
    'sourceLanguage' => 'zh-CN',

    'components' => [
        // 文件缓存
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // redis配置
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => env('REDIS_HOST'),
            'port' => env('REDIS_PORT'),
            'database' => 0,
        ],
        // config->components 添加
        /*'asyncLog' => [
            'class' => '\\common\\kafka\\models\\Log',
            'broker_list' => 'localhost:9092',
            'topic' => 'cps',
        ],*/
        // 日志组件
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                // 注意，如果其他应用需要覆盖这里定义的日志，可以重新定义其key即可，例如覆盖 all-error
                'all-error' => [
                    // 记录php/框架等所有的错误日志
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'categories' => [],
                    'except' => ['es'],
                    'maxFileSize' => 102400, // 100M
                    'maxLogFiles' => 10, // 最多多少个日志文件
                    'logVars' => [], // 被收集的额外数据
                ],
                'api-error' => [
                    // API的日志
                    'class' => 'common\core\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['api'],
                    'logVars' => [], // 被收集的额外数据
                    'maxFileSize' => 102400, // 100M
                    'logFile' => $logfile,
                    'prefix'    =>  function($message){
                        $data = \yii\helpers\Json::decode($message[0]);
                        $userID = empty($data['uid']) ? "-":$data['uid'];
                        $userIP = empty($data['ip']) ? "-":$data['ip'];
                        return "[$userIP][$userID]";
                    }
                ],
                'queue-success' => [
                    'class' => 'common\core\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['queue'],
                    'logVars' => [], // 被收集的额外数据
                    'maxFileSize' => 102400, // 100M
                    'logFile'   =>  '@console/runtime/queue/success'.DIRECTORY_SEPARATOR.date('Y-m-d').'.log',
                ],
                'queue-error' => [
                    'class' => 'common\core\FileTarget',
                    'levels' => ['error'],
                    'categories' => ['queue'],
                    'logVars' => [], // 被收集的额外数据
                    'maxFileSize' => 102400, // 100M
                    'logFile'   =>   '@console/runtime/queue/error' . DIRECTORY_SEPARATOR . date('Y-m-d') .'.log'
                ],
                'es-error' => [
                    // es的日志
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'categories' => ['es'],
                    'logVars' => [], // 被收集的额外数据
                    'maxFileSize' => 102400, // 100M
                    'logFile' => LOG_PATH.'/es'.DIRECTORY_SEPARATOR.date('Y-m').DIRECTORY_SEPARATOR.date('Y-m-d').'.log',
                ],
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
                    'basePath'=>'@common/messages',
                    'sourceLanguage' => 'zh-CN',
                    'fileMap' => [
                        'api'=>'api.php',
                        'common'=>'common.php',
                        'backend'=>'backend.php',
                        'frontend'=>'frontend.php',
                    ],
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@yii/messages',
                ],
            ],
        ],
    ],

];
