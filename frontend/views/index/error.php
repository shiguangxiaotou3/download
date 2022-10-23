<?php

use \yii\web\View;
use \ShiGuangXiaoTou\models\FileInfo;

/** @var $this View */
/** @var $data array */
$path = Yii::$app->assetManager->getPublishedUrl("@appAssets/webslides")."/static/images";
?>

<section class="aligncenter">
    <span class="background" style="background-image:url('<?= $path ?>/error/404.jpg')"></span>
    <div class="wrap" >
        <h1 >Page not found!</h1>
        <p class="text-symbols">* * *</p>
        <p>Please check your URL or <a href="/">return to the Home Page</a>.</p>
    </div>
    <!-- end .wrap -->
</section>
