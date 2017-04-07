<?php

namespace app\commands;

use yii\base\Widget;
use yii\helpers\Html;

class MyWidget extends Widget
{
    public $type;
    public $params;

    /*初始化属性*/
    public function init(){
        parent::init();
        if ($this->type === null) {
            $this->type = 'none';
        }
    }

    /*返回渲染结果*/
    public function run(){
        if($this->type == 'clalist'){
            return $this->clalist();
        }elseif($this->type == 'right_label'){
            return $this->right_label();
        }elseif($this->type == 'right_hot'){
            return $this->right_hot();
        }

        elseif($this->type == 'none'){
            return false;
        }
    }

    /*后台无限级分类列表可重用部分*/
    public function clalist(){
        return $this->render('@app/views/widget/clalist', [
            'params' => $this->params,
        ]);
    }

    /*前台右侧标签*/
    public function right_label(){
        $class = \app\modules\admin\models\ClassInfo::get_child();
        return $this->render('@app/views/widget/right_label', [
            'params' => $class,
        ]);
    }

    /*前台右侧HOT 10 文章列表*/
    public function right_hot(){
        $article = \app\modules\admin\models\Article::right_hot();
        return $this->render('@app/views/widget/right_hot', [
            'params' => $article,
        ]);
    }


}