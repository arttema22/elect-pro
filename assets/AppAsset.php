<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/camera.css',
        'css/xoverlay.css',
    ];
    public $js = [

        'js/jquery.easing.1.3.js',
        'js/jquery.mobile.customized.min.js',
        'js/camera.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
