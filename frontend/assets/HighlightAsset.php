<?php


namespace ShiGuangXiaoTou\assets;


use yii\web\AssetBundle;
use yii\web\View;

class HighlightAsset  extends AssetBundle{

    public $sourcePath =  "@appAssets/highlight";
    public $css = [
        "styles/monokai_sublime.css",
        'mac.css'
    ];
    public $js = [
        'highlight.pack.js',
        "mac.js"
    ];
    public $jsOptions=[
       "position"=>View::POS_HEAD
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}