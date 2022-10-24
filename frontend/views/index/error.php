<?php

use \yii\web\View;

/** @var $this View */
/** @var $data array */
$path = Yii::$app->assetManager->getPublishedUrl("@appAssets/webslides")."/static/images";
?>

<section class="aligncenter">
    <span class="background" style="background-image:url('<?= $path ?>/error/error.jpg')"></span>
    <div class="wrap"  style="color: red" >
        <h1 ><?=Yii::t('app','Page not found!')?></h1>
        <p class="text-symbols">* * *</p>
        <p><?=Yii::t('app','Please check your URL or <a href="/">return to the Home Page</a>')?>.</p>
    </div>
    <!-- end .wrap -->
</section>
