<?php
    /* @var $this ShiGuangXiaoTou\View */
    /* @var $content string */
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
<body class="login-page">
<?php $this->beginBody() ?>
    <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

