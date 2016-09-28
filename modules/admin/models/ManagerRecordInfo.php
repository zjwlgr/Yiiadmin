<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class ManagerRecordInfo extends ActiveRecord{

    public static  function tableName() {
        return '{{%manager_record}}';
    }

    /*添加管理员登录信息，ip，时间，浏览器，系统*/
    public static function add($array){
        $managerrecord = new ManagerRecordInfo();
        $managerrecord->user_id = $array['id'];
        $managerrecord->username = $array['username'];
        $managerrecord->uname = $array['uname'];
        $managerrecord->ip = \Yii::$app->request->userIP;
        $managerrecord->time = time();
        $managerrecord->browser = \Yii::$app->myhelper->determinebrowser();
        $managerrecord->system = \Yii::$app->myhelper->determineplatform();
        $result = $managerrecord->save();
        return $result;
    }

    /*管理员登录日志-列表*/
    public static function record_list($pageSize, $page, $search){
        $query = ManagerRecordInfo::find()
            ->select(['a.id','a.user_id','a.username','a.uname','a.ip','a.time','a.browser','a.system','b.number'])
            ->join('a LEFT JOIN',['b' => '{{%manager}}'], 'a.user_id = b.id');
        if(!empty($search)){
            $query->where(['like', 'a.username', $search])
                ->orWhere(['like', 'a.uname', $search]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'page' => $page-1]);
        $list = $query->orderBy('a.id DESC')->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();
        //return $query->createCommand()->sql;
        return ['list' => $list, 'page' => $pagination, 'count' => $count];
    }

    /*根据ID删除*/
    public static function deletes($id){
        $managerrecord = ManagerRecordInfo::findOne($id);
        $managerrecord->delete();
    }

    /*根据user_id删除*/
    public static function deletes_user($user_id){
        ManagerRecordInfo::deleteAll('user_id = :user_id', [':user_id' => $user_id]);
    }


}