<?php

namespace backend\assets;

use yii\web\AssetBundle;

class CoreAsset extends AssetBundle
{
    // 全局CSS文件
    public $css = [
        'https://img.app.cps.com.cn/theme/plugins/global/plugins.bundle.css?v=7.0.3',
        'https://img.app.cps.com.cn/theme/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3',
        'https://img.app.cps.com.cn/theme/css/style.bundle.css?v=7.0.3',
    ];

    // 全局JS文件
    public $js = [
        'https://img.app.cps.com.cn/theme/plugins/global/plugins.bundle.js?v=7.0.3',
        'https://img.app.cps.com.cn/theme/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3',
        'https://img.app.cps.com.cn/theme/js/scripts.bundle.js?v=7.0.3',
    ];

    // 依赖关系
    public $depends = [
        'backend\assets\FontsAsset',
    ];
}
