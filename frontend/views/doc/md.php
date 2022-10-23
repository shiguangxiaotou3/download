<?php


use yii\web\View;
use yii\helpers\Markdown;
use common\widgets\Code;


/** @var $this View */
/** @var $pageData array */

$this->title = $pageData['title'];
$this->registerMetaTag(['name' => "description", "content"=>$pageData['description']]);
$basePath = Yii::getAlias('@appAssets/markdown');
Code::widget();
$markdownPath =$pageData['md'];
if(substr($pageData["md"],0,2)=="./"){
    $markdownPath = $basePath ."/".  str_replace("./","",$pageData['md']);
}

$myText = file_get_contents($markdownPath);
?>
<div class="wrapper">
    <?php
        echo Markdown::process($myText, 'gfm-comment')
    ?>
</div>