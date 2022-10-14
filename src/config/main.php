<?php

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
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'params' => [],
];
