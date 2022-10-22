<?php

use  yii\helpers\Html;
use ShiGuangXiaoTou\assets\WebSlidesAsset;

/** @var $this yii\web\View */
/** @var $content string */
WebSlidesAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="en" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#333333">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>