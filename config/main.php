<?php


return [
    "vendorPath" => dirname(__FILE__, 2) . "/vendor",
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'bootstrap' => ['crawlerdetect'],
    'components' => [
        'crawlerdetect' => [
            'class' => 'alikdex\crawlerdetect\CrawlerDetect',
            'setParams' => true, // optional, bootstrap initialize requred
        ],
    ]
];