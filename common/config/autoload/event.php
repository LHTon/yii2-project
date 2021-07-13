<?php

// 经验等级相关
return [
    // 事件节点，触发事件时需先匹配是否属于节点范围内
    // 任务系统中也需要判断事件节点
    'event_node'  => [
        'Digg'         => '点赞', // 点赞
        'Comment'      => '评论', // 评论
        'Favorite'     => '收藏', // 收藏
        'CheckIn'      => '签到', // 签到
        'EditUser'     => '编辑资料', // 编辑资料
        'Verify'       => '用户认证', // 用户认证
        'JoinActivity' => '活动报名', // 活动报名
        'Share'        => '转发分享', // 转发分享
        'Invite'       => '邀请好友', // 邀请好友
    ],

    // 事件节点触发后对应获得经验值
    'node_exp'    => [
        'Digg'         => 2, // 点赞
        'Comment'      => 8, // 评论
        'Favorite'     => 4, // 收藏
        'CheckIn'      => 8, // 签到
        'EditUser'     => 10, // 编辑资料
        'Verify'       => 50, // 用户认证
        'JoinActivity' => 8, // 活动报名
        'Share'        => 10, // 转发分享
        'Invite'       => 20, // 邀请好友
    ],

    // 每日节点经验上限
    'node_exp_up' => 50,
];


