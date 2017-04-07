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

    /*通过NAME 查询某一条数据 id,fid,name 前台导航选中*/
    public static function name_one($name){
        $ClassInfo = ClassInfo::find()
            ->select(['id','fid','name'])
            ->where(['name' => $name])
            ->asArray()->one();
        return $ClassInfo;
    }
    
    /*通过ID 查出 分类 名称 name*/
    public static function classnames($id){
        $result = ClassInfo::one($id);
        return $result['name'];
    }

    /*通过 FID 查询一个父下面子分类的集合*/
    public static function lists($fid,$count=false){
        $ClassInfo = ClassInfo::find()
            ->where(['fid' => $fid])
            ->orderBy('sort DESC,id ASC')
            ->asArray()->all();
        if($count){//是否需要子类 的子类总数
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

    /*通过 FID 查询一个父下面子分类的集合 只 id,name 前台导航
    * $type 为是否查询Swift分类
    */
    public static function list_field($fid,$type=true){
        $ClassInfo = ClassInfo::find()
            ->select(['id','name'])
            ->where(['fid' => $fid]);
            if($type) {
                $ClassInfo->andWhere(['<>', 'id', 160]);
            }
        $ClassInfo = $ClassInfo->orderBy('sort DESC,id ASC')->asArray()->all();
        return $ClassInfo;
    }

    /*列出主分类 下面所有子分类中 子分类信息 前台右侧分类*/
    public static function get_child(){
        $class_list = ClassInfo::list_field(135,false);
        $child_list = array();
        foreach($class_list as $key => $val){
            $child_list = array_merge($child_list,ClassInfo::list_field($val['id']));
        }
        return $child_list;
    }


}