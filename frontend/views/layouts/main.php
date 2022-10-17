<?php
use ShiGuangXiaoTou\assets\MyAsset;

    /* @var $this yii\web\View */
    /* @var $content string */
//echo Yii::getAlias("@web");
MyAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

