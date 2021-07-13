<?php

// 全局支付相关配置
return [

    'payment'    => [

        /** 微信支付 */
        'wx'  => [
            'use_sandbox' => false, // 是否使用 微信支付仿真测试系统

            'app_id'       => env('WX_PAY_APP_ID'),  // 应用id
            'mch_id'       => env('WX_PAY_MCH_ID'),// 微信支付分配的商户号
            'md5_key'      => env('WX_PAY_KEY'),// 用户在商户中心设置的api密钥

            // 涉及资金流动时 退款  转款，需要提供该文件
            'app_cert_pem' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'paycert' . DIRECTORY_SEPARATOR . 'apiclient_cert.pem',
            'app_key_pem'  => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'paycert' . DIRECTORY_SEPARATOR . 'apiclient_key.pem',

            'sign_type'    => 'MD5', // MD5  HMAC-SHA256
            'fee_type'     => 'CNY', // 货币类型  当前仅支持该字段
            'notify_url'   => 'https://app.cps.com.cn/api/v1/callback/weixin/notify', // 回调地址 api/v1/callback/weixin/notify
            'redirect_url' => 'https://dayutalk.cn/', // 如果是h5支付，可以设置该值，返回到指定页面

            'limit_pay' => [],
        ],

        /** 支付宝支付 */
        'ali' => [
            'use_sandbox' => false, // 是否使用沙盒模式

            'app_id'          => env('ALI_PAY_APP_ID'),// 支付宝分配给开发者的应用ID

            // 支付宝公钥字符串
            'ali_public_key'  => env('ALI_PAY_PUBLIC_KEY'),
            // 自己生成的密钥字符串
            'rsa_private_key' => env('ALI_PAY_PRIVATE_KEY'),

            'sign_type'  => 'RSA2', // RSA  RSA2
            'fee_type'   => 'CNY', // 货币类型  当前仅支持该字段
            "notify_url" => 'https://app.cps.com.cn/api/v1/callback/alipay/notify', // 回调地址
            "return_url" => 'https://app.cps.com.cn',// 我的博客地址

            'limit_pay' => [],
        ]
    ],

    // 订单类型
    'order_type' => [
        1 => '会员',
        2 => '活动',
        3 => '课程',
        4 => '商品',
    ],

    // 支付状态
    'pay_status' => [
        0 => '未支付',
        1 => '已支付'
    ],
    // 支付类型
    'pay_type'   => [
        1 => '微信',
        2 => '支付宝',
        3 => '银联',
    ],
    // 支付途径
    'pay_source' => [
        1 => '网站',
        2 => '微信',
        3 => '后台',
    ],

];


