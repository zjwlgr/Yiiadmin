<?php

namespace app\modules\mobile\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\ClassInfo;

class CommonController extends Controller {

    public function init() {
        $view = \Yii::$app->getView();//获取当前视图对像
        $view->params['nav_list'] = $this->nav_list();
        $view->params['nav_active_m'] = $this->nav_active_m();
    }

    /*导航列表*/
    public function nav_list(){
        $class_list = ClassInfo::list_field(135);
        return $class_list;
    }

    /*导航选中状态设置 手机站设置*/
    public function nav_active_m(){
        $PathInfo = Yii::$app->request->getPathInfo();//获取当前url host/ 之后
        $PathInfo = substr($PathInfo,0,-5);//去掉 .html
        $path_ar = explode('-',$PathInfo);//有中杠的情况 解析数组
        $path_str = empty($path_ar[1]) ? '' : $path_ar[1];//取第一个值
        $class = ClassInfo::name_one($path_str);
        if(empty($class) || $class['fid'] == 135){
            //查询的结果为空或 fid ＝ 135 为：一级分类或其它导航
            $result = $path_str == 'javascript' ? 'JS' : $path_str;
        }else{//否则子分类存在
            $classname = ClassInfo::classnames($class['fid']);//查询出一级分类
            $result = $classname == 'Javascript' ? 'JS' : $classname;
        }
        return strtolower($result);
    }



}
