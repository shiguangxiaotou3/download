<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
return [
    'id' => 'ShiGuangXiaoTou',
    'name' => 'ShiGuangXiaoTou',
    'basePath' =>dirname(__DIR__),
    'defaultRoute' => "index",
    'controllerNamespace' => 'ShiGuangXiaoTou\controllers',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-shiguangxiaotou',
        ],
        "cache"=>[
            'class'=>"yii\caching\FileCache",
            "cachePath" => "@runtime/cache"
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction' => 'index/error',
        ],
    ],

    'params' => $params
];
