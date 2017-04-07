<?php

namespace app\modules\index\controllers;

use Yii;

class ToolsController extends CommonController
{

    /*Json 格式化*/
    public function actionIndex(){
        return $this->render('index');
    }

    /*Unix 时间格式化*/
    public function actionUnix(){
        return $this->render('unix');
    }

    /*Md5 加密*/
    public function actionMd5(){
        return $this->render('md5');
    }

    /*Url 编码*/
    public function actionUrl(){
        return $this->render('url');
    }

}
