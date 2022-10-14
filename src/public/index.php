<?php
define("SRC",dirname(__FILE__,2));
define("VENDOR",dirname(__FILE__,3)."/vendor");
define('YII_DEBUG', true);



require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';


$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);
(new yii\web\Application($config))->run();