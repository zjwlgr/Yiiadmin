<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'version' => '1.0',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    //'catchAll' => ['site/offline'],//全拦截路由
    'modules' => [
        'index' => 'app\modules\index\Module',
        'admin' => 'app\modules\admin\Module',
    ],
    'aliases' => [//自定义别名
        '@foo' => '/path/to/foo',
        '@bar' => 'http://www.example.com',
    ],
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'myhelper' => [
            'class' => 'app\commands\Form1Helper',//自定义组件
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,//属性强制它切换漂亮的URL格式
            'showScriptName' => false,//是否显示入口index.php名称
            'enableStrictParsing' => false,//此属性确定是否启用严格要求解析
            'suffix' => '.html',
            'rules' => require(__DIR__ . '/rules.php'),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'FR1BNEnrSyIVFjrwbMsdbgYZCdeMjRpG',
            'enableCsrfValidation' => true,//开启或关闭验证_csrf
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // 根据 `dev` 环境进行的配置调整
    //$config['bootstrap'][] = 'debug';//开启或关闭调试工具
    //$config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
