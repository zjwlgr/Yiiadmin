<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class ManagerInfo extends ActiveRecord{

    public $validates;

    const SCENARIO_LOGIN = 'login';
    const SCENARIO_REGISTER = 'register';
    const SCENARIO_EDITOR = 'editor';
    const SCENARIO_EDITPWD = 'editpwd';

    public static  function tableName() {
        return '{{%manager}}';
    }

    public function rules() {
        return [
            [['username', 'password'], 'required', 'on' => 'login'],
            [['username', 'password', 'group_id', 'uname'], 'required', 'on' => 'register'],
            [['username', 'group_id', 'uname'], 'required', 'on' => 'editor'],
            [['password'], 'required', 'on' => 'editpwd'],
            [['validates'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => '用户名',
            'password' => '密码',
            'validates' => '验证码',
        ];
    }

    public function login($username){
        $rows = $this->db->createCommand('SELECT id,username,password,uname,number,group_id,locking FROM '.ManagerInfo::tableName().' WHERE username=:username')
            ->bindValues([':username' => $username])
            ->queryOne();
        return $rows;
    }

    /*更新manager表管理员的，登录次数，登录IP，登录时间*/
    public function number($id,$number){
        $this->db->createCommand()->update(ManagerInfo::tableName(), [
            'number' => $number + 1,
            'login_ip' => \Yii::$app->request->userIP,
            'login_time' => time()
        ], 'id = '.$id)->execute();
    }

    /*查询当前模块表数据总数*/
    public static function count(){
        $count = ManagerInfo::find()->count();
        return $count;
    }

    public static function manager_list($pageSize, $page, $search, $group_id){
        $query = ManagerInfo::find()
            ->select(['id','username','uname','group_id','locking','number','login_ip','login_time','ctime']);
        if(!empty($group_id)) {
            $query->where(['group_id' => $group_id]);
        }
        if(!empty($search)){
            $query->andWhere(['or', ['like', 'username', $search], ['like', 'uname', $search]]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'page' => $page-1]);
        $list = $query->orderBy('id ASC')->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();
        //return $query->createCommand()->sql;
        return ['list' => $list, 'page' => $pagination, 'count' => $count];
    }

    public static function check_username($username,$id=''){
        $ManagerInfo = ManagerInfo::find()
            ->where(['username' => $username]);
            if(!empty($id)){
                $ManagerInfo->andWhere(['<>', 'id', $id]);
            }
        $query = $ManagerInfo->asArray()->one();
        return $query;
    }

    public static function add($post){
        $check_user = ManagerInfo::check_username($post['username']);
        if(empty($check_user)) {
            $ManagerInfo = new ManagerInfo();
            $ManagerInfo->username = $post['username'];
            $ManagerInfo->password = md5($post['password']);
            $ManagerInfo->uname = $post['uname'];
            $ManagerInfo->group_id = $post['group_id'];
            $ManagerInfo->locking = $post['locking'];
            $ManagerInfo->ctime = time();
            $result = $ManagerInfo->save();
        }else{
            $result = false;
        }
        return $result;
    }

    public static function up($post){
        $check_user = ManagerInfo::check_username($post['username'],$post['id']);
        if(empty($check_user)) {
            $ManagerInfo = ManagerInfo::findOne($post['id']);
            $ManagerInfo->username = $post['username'];
            if (!empty($post['password'])) {
                $ManagerInfo->password = md5($post['password']);
            }
            $ManagerInfo->uname = $post['uname'];
            $ManagerInfo->group_id = $post['group_id'];
            $ManagerInfo->locking = $post['locking'];
            $result = $ManagerInfo->save();
        }else{
            $result = false;
        }
        return $result;
    }

    public static function editpwd($post){
        $ManagerInfo = ManagerInfo::find()
            ->where(['id' => $post['id'], 'password' => md5($post['oldpassword'])])
            ->asArray()->one();
        if(!empty($ManagerInfo)) {
            $ManagerInfo = ManagerInfo::findOne($post['id']);
            $ManagerInfo->password = md5($post['password']);
            $result = $ManagerInfo->save();
        }else{
            $result = false;
        }
        return $result;
    }

    public static function manager_one($id){
        $ManagerInfo = ManagerInfo::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $ManagerInfo;
    }

    public static function deletes($id){
        $ManagerInfo = ManagerInfo::findOne($id);
        $ManagerInfo->delete();
        //ManagerRecordInfo::deletes_user($id);
    }

    /*根据管理员的ID，查询管理，返回列表，用于：文章发布者*/
    public static function manager_article(){
        $list = ManagerInfo::find()
            ->select(['id','uname'])
            ->where(['id' => [1,2]])
            ->orderBy('id ASC')
            ->asArray()->all();
        return $list;
    }


}