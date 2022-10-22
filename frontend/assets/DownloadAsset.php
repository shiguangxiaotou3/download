<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;

class DownloadAsset extends AssetBundle{

    public $sourcePath =  "@appAssets/download";
    public $css = [
        'css/download.css',
    ];
    public $js = [
        "js/download.js"
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}