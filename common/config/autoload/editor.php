<?php

// 全局编辑器配置
return [
    // UEditor编辑器配置
    'ueditorConfig' => [
        // 图片上传配置
        //'imageRoot'            => Yii::getAlias("@storage/web"), //图片path前缀
        'imageRoot'            => Yii::getAlias("@base/web/"), //图片path前缀，服务器解析到/web/目录时，上传到这里
        'imageUrlPrefix'       => 'http://img.app.cps.com.cn', //图片url前缀
        'imagePathFormat'      => '/uploads/{yyyy}/{mm}/{dd}/editor{time}{rand:6}',

        // 文件上传配置   {未使用}
        //'fileRoot'             => Yii::getAlias("@storage/web"), //文件path前缀
        'fileRoot'             => Yii::getAlias("@base/web/"), //文件path前缀，服务器解析到/web/目录时，上传到这里
        'fileUrlPrefix'        => 'http://img.app.cps.com.cn', //文件url前缀
        'filePathFormat'       => '/uploads/files/{yyyy}/{mm}/{dd}/editor{time}{rand:6}',

        // 上传视频配置    {未使用}
        //'videoRoot'            => Yii::getAlias("@storage/web"),
        'videoRoot'            => Yii::getAlias("@base/web/storage"), // 服务器解析到/web/目录时，上传到这里
        "videoUrlPrefix"       => Yii::getAlias('@storageUrl'),
        'videoPathFormat'      => '/video/{yyyy}{mm}/editor{time}{rand:6}',

        // 涂鸦图片上传配置项     {未使用}
        //'scrawlRoot'           => Yii::getAlias("@storage/web"),
        'scrawlRoot'           => Yii::getAlias("@base/web/storage"), // 服务器解析到/web/目录时，上传到这里
        "scrawlUrlPrefix"      => Yii::getAlias('@storageUrl'),
        'scrawlPathFormat'     => '/image/{yyyy}{mm}/editor{time}{rand:6}',
    ],
];


