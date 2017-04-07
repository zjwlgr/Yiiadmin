<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

class FunctionInfo extends ActiveRecord{

    public static  function tableName() {
        return '{{%function}}';
    }

    public function rules() {
        return [
            [['fname', 'furi'], 'required'],
        ];
    }

    /*添加功能组 或 功能*/
    public static function add($post){
        if($post['fid'] == 0){//新增功能组
            $function = new FunctionInfo();
            $function->fid = $post['fid'];
            $function->fname = $post['fidname'];
            $function->furi = 'none';
            $function->ctime = time();
            $function->save();
            $insert_id = $function->attributes['id'];
            $post['fid'] = $insert_id;
        }
        $function = new FunctionInfo();
        $function->fid = $post['fid'];
        $function->fname = $post['fname'];
        $function->furi = $post['furi'];
        $function->ctime = time();
        $result = $function->save();
        return $result;
    }

    /*查询功能组列表 添加 页面中用到*/
    public static function group_list($state = false,$idin = false){
        $query = FunctionInfo::find()
            ->select(['id','fname','sort','candel','state','ctime'])
            ->where(['fid' => 0]);
            if($state){
                $query->andWhere(['state' => 0]);
            }
            if(!empty($idin)){
                $query->andWhere('id in('.$idin.')');
            }
            $list = $query->orderBy('sort ASC')->asArray()->all();
        return $list;
    }

    /*管理页面列表*/
    public static function funt_list($fid,$state = false,$idin = false){
        $query = FunctionInfo::find()
            ->select(['id','fid','fname','furi','sort','candel','state','ctime'])
            ->where(['fid' => $fid]);
            if($state){
                $query->andWhere(['state' => 0]);
            }
            if(!empty($idin)){
                $query->andWhere('id in('.$idin.')');
            }
            $list = $query->orderBy('sort ASC')->asArray()->all();
        return $list;
    }

    /*根据ID查询一条数据*/
    public static function funt_one($id){
        $function = FunctionInfo::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $function;
    }

    /*根据FURI查询一条数据*/
    public static function furi($url){
        $function = FunctionInfo::find()
            ->select(['id','furi'])
            ->where(['furi' => $url])
            ->asArray()->one();
        return $function;
    }

    /*编辑功能或功能组*/
    public static function up($post){
        $function = FunctionInfo::findOne($post['id']);
        $function->fid = isset($post['fid']) ? $post['fid'] : 0;
        $function->fname = $post['fname'];
        $function->furi = $post['furi'];
        $function->sort = $post['sort'];
        $function->state = $post['state'];
        $result = $function->save();
        return $result;
    }

    /*删除功能组或功能*/
    public static function deletes($id){
        $funt_one = FunctionInfo::funt_one($id);
        if($funt_one['candel'] == 0) {
            $function = FunctionInfo::findOne($id);
            $function->delete();
        }
    }

    /*搜索子功能（fid<>0 为子功能） 根据关键字*/
    public static function search($keyword){
        $function = FunctionInfo::find()
            ->select(['id'])
            ->where(['<>', 'fid', 0])
            ->andWhere(['like', 'fname', $keyword])
            ->asArray()->all();
        return $function;
    }

    /*通过子功能ID，查询父功能ID，ID*/
    public static function parentid($childid){
        $function = FunctionInfo::find()
            ->select(['fid'])
            ->where('id in('.$childid.')')
            ->groupBy('fid')
            ->asArray()->all();
        return $function;
    }


}