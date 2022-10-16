<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=download',
            'username' => 'root',
            'password' => '757402123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样，这里是QQ发送！
                'username' => '757402123@qq.com',  //这里是你本人的QQ邮箱
                'password' => 'bjhxxjyxnrgibbeg',  //qq授权码（可以在邮箱设置/账户/）
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['757402123@qq.com' => '时光小偷']  //这里邮箱是你本人邮箱
            ],
        ],
    ]
];