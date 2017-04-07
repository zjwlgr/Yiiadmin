<?php

namespace app\modules\api\models;

use yii\db\ActiveRecord;

class Article extends ActiveRecord{

    public static  function tableName() {
        return '{{%article}}';
    }

    public function fields(){
        return ['id','title'];
    }

    public static function lists($p = 1){
        $pagesize = 20;
        $num = $pagesize*(intval($p)-1);
        $Article = Article::find()
            ->select(['id','class_one','class_two','title'])
            ->where(['is_release' => '1'])//已发布的
            ->orderBy('id DESC')
            ->offset($num)
            ->limit($pagesize)
            ->asArray()->all();
        return $Article;
    }


}