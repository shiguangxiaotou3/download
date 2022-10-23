<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;

class WebSlidesAsset extends AssetBundle
{
    public $sourcePath =   "@appAssets/webslides";
    public $css = [
        'static/css/svg-icons.css',
        "static/css/webslides.css"
    ];
    public $js = [
        "static/js/svg-icons.js",
        "static/js/webslides.js"
    ];
    public $depends = [];
}