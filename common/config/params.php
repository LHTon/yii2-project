<?php

$config = [
    // 全局管理员邮箱
    'adminEmail'                    => 'phphome@qq.com',

    // 系统邮箱，用于发送系统邮件
    'sysEmail'                      => env('MAIL_USERNAME'),

    // 重置密码超时
    'user.passwordResetTokenExpire' => 3600,

    // 默认参数过滤方法，在调用request->get()和post()方法时，将自动调用指定的函数处理数据
    'default_filter'                => 'trim',

    // 上传的图片路径是否加密，配合 \common\helpers\Html::src()使用
    'storage_encrypt'               => false,

    // 上传文件
    // 注意，上传的文件中有3个文件夹
    // theme ==》 界面主题css/js/css等
    // uploads ==》 用户上传的所有图片
    // webimages ==》 网络上的图片下载到本地
    'upload'                        => [
        'url'  => Yii::getAlias('@storageUrl/image/'),
        'path' => Yii::getAlias('@base/web'),
        //'path' => Yii::getAlias('@storage/web/image/'),
    ],

    // 多语言配置
    'language'                      => [
        'zn-CN', 'zh-TW', 'en-US'
    ],

    // 举报分类
    'report'                        => [
        1 => '非海归或身份造假',
        2 => '该用户存在诈骗行为',
        3 => '该用户可能被盗用',
        4 => '该用户存在骚扰行为',
        5 => '广告/色情/政治/违法/暴恐内容',
        6 => '该内容涉及侵权',
        7 => '该内容涉及诈骗',
        8 => '其他',
    ],

    // 热门搜索关键词
    'hot_keyword' => '5G 疫情 无人机 云计算 智能交通',

    // 禁用信息相关字段默认显示
    'ban' => [
        'nickname' => '注销用户',
        'avatar'   => 'http://img.app.cps.com.cn/theme/app/nopic/nopic.png',
        'title'    => '该信息已删除',
    ],
    // 激光推送的日志
    'jpush_log_path' => Yii::getAlias('@api/runtime') . '/jpush.log',

    // 订单过期时间
    'order_expire' => 60 * 30,

    // 登录access_token过期时间
    'token_expire' => 3600 * 24 * 30,

    //快讯栏目ID
    'news_flash'    =>  21
];

// 加载autoload目录下的配置文件
foreach (glob(__DIR__ . '/autoload/*.php') as $filename) {
    $config = array_merge($config, require($filename));
}

return $config;