<?php


use yii\web\View;
use yii\helpers\Markdown;
use common\widgets\Code;


/** @var $this View */
/** @var $data array */

Code::widget();
$markdownPath = Yii::getAlias('@appAssets/markdown/Google Translate Client.md');
$myText = file_get_contents($markdownPath);
?>
<div class="wrapper">
    <?php
    echo Markdown::process($myText, 'gfm-comment')

    ?>
</div>