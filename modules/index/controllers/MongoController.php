<?php

namespace app\modules\index\controllers;

use yii\web\Controller;
use app\modules\index\models\Customer;

class MongoController extends Controller
{
    public function actionIndex(){
        $res = Customer::cmsInfo();
        var_dump ( $res );

    }
}















