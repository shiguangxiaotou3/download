#!/usr/bin/env php
<?php
/**
 * Yii console bootstrap file.
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/bootstrap.php';
require __DIR__ . '/console/config/bootstrap.php';
if(YII_DEBUG){
    require __DIR__. '/unit/debug.php';
}


$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/main.php',
    require __DIR__."/main-local.php",
    require __DIR__ . '/console/config/main.php',
    require __DIR__ . '/console/config/main-local.php'
);

$exitCode = (new yii\console\Application($config))->run();
exit($exitCode);