<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;

class JvectormapAsset extends AssetBundle
{
    public $sourcePath =  "@bower/jvectormap";
    public $css = [
        'jquery-jvectormap.css',
    ];
    public $js = [
        "jquery-jvectormap.js"
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}