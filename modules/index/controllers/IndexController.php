<?php

namespace app\modules\index\controllers;

use yii\helpers\Url;
use yii\web\Controller;


class IndexController extends Controller
{

    public function actionIndex(){

        return $this->render('index');
    }

    public function actionTopic(){
        return $this->render('topic');
    }
}
