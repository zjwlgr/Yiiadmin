<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class ManagerGroupInfo extends ActiveRecord{

    public static  function tableName() {
        return '{{%manager_group}}';
    }

    public function rules() {
        return [
            [['gname','function'], 'required'],
        ];
    }

    public static function add($post){
        foreach($post['function'] as $val){
            $newar = explode('_',$val);
            $func_ar[$newar[0]][] = $newar[1];
        }
        $function_json = json_encode($func_ar);
        $ManagerGroup = new ManagerGroupInfo();
        $ManagerGroup->gname = $post['gname'];
        $ManagerGroup->function = $function_json;
        $ManagerGroup->ctime = time();
        $result = $ManagerGroup->save();
        return $result;
    }

    public static function up($post){
        foreach($post['function'] as $val){
            $newar = explode('_',$val);
            $func_ar[$newar[0]][] = $newar[1];
        }
        $function_json = json_encode($func_ar);
        $ManagerGroup = ManagerGroupInfo::findOne($post['id']);
        $ManagerGroup->gname = $post['gname'];
        $ManagerGroup->function = $function_json;
        $ManagerGroup->ctime = time();
        $result = $ManagerGroup->save();
        return $result;
    }

    public static function count(){
        $count = ManagerGroupInfo::find()->count();
        return $count;
    }

    public static function lists($pageSize, $page, $search){
        $query = ManagerGroupInfo::find()
            ->select(['id','gname','function','ctime']);
        if(!empty($search)){
            $query->where(['like', 'gname', $search]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'page' => $page-1]);
        $list = $query->orderBy('id ASC')->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();
        //return $query->createCommand()->sql;
        return ['list' => $list, 'page' => $pagination, 'count' => $count];
    }

    public static function deletes($id){
        $ManagerGroupInfo = ManagerGroupInfo::findOne($id);
        $ManagerGroupInfo->delete();
    }

    public static function group_one($id){
        $ManagerGroupInfo = ManagerGroupInfo::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $ManagerGroupInfo;
    }

    public static function select_list(){
        $query = ManagerGroupInfo::find()->select(['id','gname'])->asArray()->all();
        return $query;
    }







}