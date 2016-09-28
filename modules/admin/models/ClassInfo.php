<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

class ClassInfo extends ActiveRecord{

    public static  function tableName() {
        return '{{%class}}';
    }

    public static function add($post){
        $one = ClassInfo::one($post['fid']);
        $ClassInfo = new ClassInfo();
        $ClassInfo->fid = $post['fid'];
        $ClassInfo->nexus = $one['nexus'].$post['nexus'];
        $ClassInfo->depth = $post['depth'];
        $ClassInfo->name = $post['name'];
        $ClassInfo->ctime = time();
        $ClassInfo->save();
        $post['id'] = Yii::$app->db->getLastInsertID();
        return $post;
    }

    /*通过ID 查询某一条数据*/
    public static function one($id){
        $ClassInfo = ClassInfo::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $ClassInfo;
    }

    /*通过 FID 查询一个父下面子分类的集合*/
    public static function lists($fid,$count=false){
        $ClassInfo = ClassInfo::find()
            ->where(['fid' => $fid])
            ->orderBy('sort DESC,id ASC')
            ->asArray()->all();
        if($count){//是否需要子类总数
            foreach($ClassInfo as $key => $val){
                $ClassInfo[$key]['count'] = ClassInfo::total($val['id']);
            }
        }
        return $ClassInfo;
    }

    /*通过ID 删除分类与所有级的子分类*/
    public static function deletes($id){
        ClassInfo::deleteAll('FIND_IN_SET('.$id.',nexus)');
        $ClassInfo = ClassInfo::findOne($id);
        $ClassInfo->delete();
    }

    /*编辑分类信息*/
    public static function updates($post){
        $ClassInfo = ClassInfo::findOne($post['id']);
        if(!empty($post['name'])) {
            $ClassInfo->name = $post['name'];
        }
        if(!empty($post['sort'])) {
            $ClassInfo->sort = $post['sort'];
        }
        $result = $ClassInfo->save();
        return $result;
    }

    /*通过 FID 查询子分类总数*/
    public static function total($fid){
        $ClassInfo = ClassInfo::find()
            ->where(['fid' => $fid])
            ->count();
        return $ClassInfo;
    }


}