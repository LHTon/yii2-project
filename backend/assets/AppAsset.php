<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    // 全局CSS文件
    public $css = [];

    // 全局JS文件
    public $js = [];

    // 依赖关系
    public $depends = [
        'backend\assets\FontsAsset',
        'backend\assets\CoreAsset',
    ];

    /**
     * 定义按需加载JS方法，注意加载顺序在最后
     *
     * @param $view
     * @param $jsfile
     * @author linhongtong
     * date: 2021/7/7 15:34
     */
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    /**
     * 定义按需加载css方法，注意加载顺序在最后
     *
     * @param $view
     * @param $cssfile
     * @author linhongtong
     * date: 2021/7/7 15:41
     */
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
//    public $css = [
//        'css/site.css',
//    ];
//    public $js = [
//    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
