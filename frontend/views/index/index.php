<?php

use yii\web\View;
use ShiGuangXiaoTou\widgets\CardWidget;
use ShiGuangXiaoTou\widgets\CategoryWidget;
use ShiGuangXiaoTou\models\FileInfo;
use yii\helpers\Html;
/** @var $this View */
/** @var $data array */

$basePath= Yii::$app->assetManager->getPublishedUrl("@appAssets/webslides");


?>

<section>
    <span class="background" style="background-image:url('<?= $basePath ?>/static/images/background/dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap aligncenter" style="color: white">
        <h1 class=""><strong>时光小偷的的代码，接口分享</strong></h1>
        <p class="text-intro">WebSlides makes HTML presentations easy.<br>
            Just the essentials and using lovely CSS.
        </p>
        <p>
            <a href="https://www.shiguangxiaotou.com" class="button zoomIn" title="">
                <svg class="fa-cloud-download">
                    <use xlink:href="#fa-cloud-download"></use>
                </svg>
                开始使用
            </a>
        </p>
    </div>
    <!-- .end .wrap -->
</section>

<?php
echo CategoryWidget::widget([
    "title" => "工具",
    "description" => "测试工具",
    "items" => [
        [
            "icon" => "fa-paint-brush",
            "title" => "translate",
            "description" => "Googel 翻译中转api.",
            "href" => "/doc/md/1",
        ],
        [
            "icon" => "fa-map",
            "title" => " jvectormap SVG data",
            "description" => " jvectormap 全球地图数据",
            "href" => "/download",
        ],
        [
            "icon" => "fa-download",
            "title" => "Download",
            "description" => "文件离线下载",
            "href" => "/download",
        ],
        [
            "icon" => "fa-map",
            "title" => "SVG Icon",
            "description" => "icon 图标",
            "href" => "/index/icon",
        ],

    ]
]);

echo CardWidget::widget([
    "assets" => "@appAssets/webslides",
    "title" => "文档",
    'description' => "查看源码" . Html::a(
            "Github",
            "https://github.com/shiguangxiaotou3", ["title" => "Contribute on Github"]) .
        Html::tag("span", Html::a("Wordpress &rsaquo;",
            "https://www.shiguangxiaotou.com",
            ["title" => "Wordpress Demos"]),
            ["class" => "alignright"]
        ),
    "items" => [
        ["title" => "翻译api", "href" => "/doc/md/1", "img" => "./static/images/card/translate_a.jpg"],

    ],
]); ?>

<section class="aligncenter">
    <!-- .wrap = container (width: 90%) -->
    <div class="wrap">
        <h2><strong>Ready to Start?</strong> </h2>
        <p class="text-intro">Create your own presentation instantly. <br>120+ premium slides ready to use.</p>
        <p>
            <a href="https://webslides.tv/webslides-latest.zip" class="button" title="Download WebSlides">
                <svg class="fa-cloud-download">
                    <use xlink:href="#fa-cloud-download"></use>
                </svg>
                Free Download
            </a>
            <span class="try">
                <a href="https://www.paypal.me/jlantunez/8" title="Thanks :)">
                  <svg class="fa-paypal">
                    <use xlink:href="#fa-paypal"></use>
                  </svg>
                  Pay what you want.
                </a>
              </span>
        </p>
    </div>
    <!-- .end .wrap -->
</section>

