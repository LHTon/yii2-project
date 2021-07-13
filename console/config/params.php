<?php
return [
    'adminEmail'  => 'phphome@qq.com',
    'adminMobile' => '13631539420',

    'queue' => [
        // 基本配置
        'daemon'                  => true, // 是否以守护模式运行 可以通过 -d=true 选项修改
        'masterProcessName'       => 'cpsapp:master', //主进程名称
        'enableNotice'            => true, //是否开启预警通知，出问题会短信通知管理员
        'logPath'                 => '日志文件目录', //日志文件路径
        'childProcessMaxExecTime' => 86400, //子进程最大执行时间，达到后自动重启进程，避免运行时间过长，释放内存，单位：秒

        'tickQueueStatusTime'     => 60, // 定时任务，检查队列状态的定时器的时间间隔，单位：秒
        'tickServerStatusTime'    => 60, // 定时任务，检查服务器状态的定时器的时间间隔，单位：秒
        'tickDelayMsgTime'        => 30, // 定时任务，检查延迟消息的定时器的时间间隔，单位：秒

        //消息服务连接配置
        'connection' => [
            'host'            => '127.0.0.1',
            'port'            => '5672',
            'timeout'         => 3,
        ],

        // 队列配置
        'queues' => [
            // 业务队列(优先级高)
            'queue_work' => [
                'queueName'      => 'queue_work', //队列名称，注意和key同名
                'minConsumerNum' => 1,  //最小消费者数量，默认1
                'maxConsumerNum' => 3,  //最大消费者数量，系统限制最大10
                'warningNum'     => 1000, //达到预警的消息数量，请合理设置，建议不少于100，队列积压消息数大于此数时需增加消费者
                'callback'       => ['\console\queue\Works', 't1'], //程序执行job，[command,action]
            ],
            // 计数队列(优先级较高)
            'queue_counter' => [
                'queueName'      => 'queue_counter',
                'minConsumerNum' => 1,
                'maxConsumerNum' => 2,
                'warningNum'     => 10000,
                'callback'       => ['\console\queue\Works', 't1'], //程序执行job，[command,action]
            ],
            // 日志队列(优先级低)
            'queue_logs' => [
                'queueName'      => 'queue_logs',
                'minConsumerNum' => 1,
                'maxConsumerNum' => 1,
                'warningNum'     => 10000,
                'callback'       => ['\console\queue\Works', 't1'], //程序执行job，[command,action]
            ],
        ],

    ],
];
