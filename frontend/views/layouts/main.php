<?php

use yii\helpers\Html;
use common\widgets\Seo;
use ShiGuangXiaoTou\assets\AppAsset;

use ShiGuangXiaoTou\assets\DownloadAsset;

/* @var $this yii\web\View */
/* @var $content string */

AppAsset::register($this);
DownloadAsset::register($this);
Seo::widget();

$menu = Yii::$app->params['menu'];
logObject($menu);
$html="";
    foreach ($menu as $item){
        $a=Html::a($item['label'],$item['url'],$item['options']);
        $html.=<<<HTML
    <div class="nav-item">
        {$a}
    </div>
HTML;
    }
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?


?>
<nav class="nav">
    <?= $html ?>
</nav>
<?= $content ?>
<div class="footer"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

