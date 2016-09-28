<?php

namespace yii\helpers;

/*主要用于 模板中所需 函数*/
class MyHelper
{
    /*测试方法  use yii\helpers\MyHelper;  MyHelper::merge(1,2); */
    public static function merge($a, $b)
    {
        echo $a.$b;
    }
}