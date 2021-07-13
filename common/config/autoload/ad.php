<?php

// 广告位
return [
    'ad' => [
        // num 该广告位最大数量，如果广告位的实际广告数量大于num，那么就随机取出几条广告展示
        1 => ['num' => 1, 'title' => '启动页','width'=>1125,'height'=>2436,'b_width'=>375,'b_height'=>812], //1125*2436（内容安全区域1125*2001） 启动页
        2 => ['num' => 1, 'title' => '弹出广告','width'=>600,'height'=>600,'b_width'=>300,'b_height'=>300], // 首页弹出图片
        3 => ['num' => 4, 'title' => '新闻banner','width'=>660,'height'=>370,'b_width'=>330,'b_height'=>185],//
        4 => ['num' => 1, 'title' => '新闻列表','width'=>220,'height'=>150,'b_width'=>440,'b_height'=>300],//
        5 => ['num' => 1, 'title' => '新闻内容通栏广告','width'=>690,'height'=>160,'b_width'=>345,'b_height'=>80], // 新闻内容下的推荐新闻处的一条广告/通栏广告
        6 => ['num' => 4, 'title' => '活动banner','width'=>660,'height'=>350,'b_width'=>330,'b_height'=>175],// 330*175
        7 => ['num' => 3, 'title' => '活动logo','width'=>221,'height'=>106,'b_width'=>221,'b_height'=>106], // 活动banner下的3个logo广告位
        8 => ['num' => 1, 'title' => '新闻内容推荐广告','width'=>220,'height'=>150,'b_width'=>440,'b_height'=>300],  // 110*74.5  // 新闻内容下的推荐新闻处的一条广告
        9 => ['num' => 24, 'title' => '企业库首页logo墙','width'=>120,'height'=>70,'b_width'=>120,'b_height'=>70],  // 120*70  // 企业库首页LOGO墙
        10 => ['num' => 30, 'title' => '企业库首页分类广告','width'=>84,'height'=>70,'b_width'=>84,'b_height'=>70],  // 84*70  // 企业库首页分类处可以任意添加广告进行覆盖

    ],
    'images' =>  [
        'article'   =>  ['num'=>1,'width'=>660,'height'=>466,'b_width'=>330,'b_height'=>233],
        'activity'   =>  ['num'=>1,'width'=>690,'height'=>414,'b_width'=>345,'b_height'=>207],
    ]
];


