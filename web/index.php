<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true); //更多错误信息与日志
defined('YII_ENV') or define('YII_ENV', 'dev'); //关闭gii等切换到生产环境 prod 为生产

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

Yii::$classMap['yii\helpers\MyHelper'] = '@app/commands/MyHelper.php';//自定义助手类

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();