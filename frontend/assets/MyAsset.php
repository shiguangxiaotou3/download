<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;

class MyAsset extends AssetBundle{

    public $basePath = '@myAssets/my';
    public $baseUrl = '@web/assets';
    public $css = [
        'css/download.css',
    ];
    public $js = [
        "js/download.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}