<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{

    public $basePath = '@webroot/assets';
    public $baseUrl = '@web';
    public $css = [
        'css/download.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}