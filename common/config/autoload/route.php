<?php

// APP前端路由映射
// 映射分两种情况，通过映射表的"param"字段判断是否含参数：
// 1、无参数的映射 /personal/About => /personal/About
// 2、有参数的映射 /activities/ActivitiesDetail?1234 => /activities/ActivitiesDetail?params_data=1234

return [
    'route' => [
        '/home/main' => [
            'path'        => '/home/Main',
            'key'         => 'params_data',
            'description' => '首页', //APP下面的几个主按钮：0新闻，1视频，2活动，3企业库，4个人
        ],
        '/article/detail' => [
            'path' => '/home/Article',
            'key' => 'params_data',       // 注意，如果有参数，必须带此参数
            'description' => '文章详情页',
        ],
        '/activity/detail' => [
            "path" => "/activities/ActivitiesDetail",
            'key' => 'params_data',
            "description" => "活动详情",
        ],
        '/user/detail' => [
            'path' => '/personal/PersonPage',
            'key' => 'params_data',
            'description' => '企业/个人用户主页',
        ],
        '/home/Search' => [
            'path' => '/home/Search',
            'description' => '搜索页',
        ],

        '/video/detail' => [
            'path' => '/home/VideoPlay',
            'key'  => 'params_data',
            'description' => '小视频内容页',
        ],
        '/verify/company' => [
            'path' => '/personal/EnClaim',
            'key'  => 'params_data',
            'description' => '企业认证界面',
        ],
    ]
];


