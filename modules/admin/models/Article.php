<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class Article extends ActiveRecord{

    public static  function tableName() {
        return '{{%article}}';
    }

    public function rules() {
        return [
            [['class_one_id','class_two_id','title','content'], 'required'],
        ];
    }

    public static function count(){
        $count = Article::find()->count();
        return $count;
    }

    public static function add($post){
        $session_manager = \Yii::$app->session->get('manager');
        $Article = new Article();
        $Article->setAttributes($post,false);
        $Article->class_one = ClassInfo::classnames($post['class_one_id']);
        $Article->class_two = ClassInfo::classnames($post['class_two_id']);
        $Article->manager_id = $session_manager['id'];
        $Article->ctime = time();
        $result = $Article->save();
        return $result;
    }

    public static function up($post){
        $Article = Article::findOne($post['id']);
        $Article->setAttributes($post,false);
        $Article->class_one = ClassInfo::classnames($post['class_one_id']);
        $Article->class_two = ClassInfo::classnames($post['class_two_id']);
        $Article->is_home = empty($post['is_home']) ? 0 : $post['is_home'];
        $result = $Article->save();
        return $result;
    }

    public static function one($id){
        $Article = Article::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $Article;
    }

    /*后台文章管理页面 列表*/
    public static function lists($pageSize, $page, $where=false){
        $query = Article::find();
        if(!empty($where['search'])){
            $query->andWhere(['like', 'title', $where['search']]);
        }
        if(!empty($where['one'])){
            $query->andWhere(['class_one_id' => $where['one']]);
        }
        if(!empty($where['two'])){
            $query->andWhere(['class_two_id' => $where['two']]);
        }
        if(!empty($where['manager'])){
            $query->andWhere(['manager_id' => $where['manager']]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'page' => $page-1]);
        $list = $query->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();
        return ['list' => $list, 'page' => $pagination, 'count' => $count];
    }

    public static function deletes($id){
        $Article = Article::findOne($id);
        $Article->delete();
    }

    /*前台右侧 HOT 10 文章列表*/
    public static function right_hot(){
        $Article = Article::find()
            ->select(['id','class_one','class_two','title'])
            ->where(['is_release' => '1'])//已发布的
            ->orderBy('click_num DESC')
            ->limit(10)
            ->asArray()->all();
        return $Article;
    }

    /*根据ID得到文章详细页面信息*/
    public static function article_one($id){
        $Article = Article::find()
            ->where(['id' => $id])
            ->asArray()->one();
        return $Article;
    }

    /*前台点击量增加 根据文章ID*/
    public static function set_access($id){
        $Article = Article::findOne($id);
        $Article->click_num += 1;
        $result = $Article->save();
        return $result;
    }

    /*前台文章，上一篇，下一篇信息，根据文章ID*/
    public static function next_up($id,$isnp){
        if($isnp == 'next'){
            $find = Article::find()->select(['id','class_one','class_two','title'])->where(['>','id',$id])->andWhere(['is_release' => '1'])->orderBy('id ASC')->limit(1)->asArray()->one();
        }else if($isnp == 'up'){
            $find = Article::find()->select(['id','class_one','class_two','title'])->where(['<','id',$id])->andWhere(['is_release' => '1'])->orderBy('id DESC')->limit(1)->asArray()->one();
        }
        return $find;
    }

    /*前台文章列表页面*/
    public static function article_list($pageSize, $page, $where=false, $search=false){
        $query = Article::find()
            ->select(['id','class_one','class_two','title','content','click_num','ctime'])
            ->where(['is_release' => 1]);
        if(!empty($where)){
             $query->andWhere(['or', ['class_one_id' => $where], ['class_two_id' => $where]]);
        }
        if(!empty($search)){
            if($search == 1){
                $query->andWhere(['like', 'title', Yii::$app->request->get('search')]);
            }else{
                $idar = explode(',',$search);
                $query->andWhere(['in', 'id', $idar]);
            }
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'page' => $page-1]);
        $list = $query->orderBy('id DESC')->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();

        //$commandQuery = clone $query;
        //echo $commandQuery->createCommand()->getRawSql();exit;

        return ['list' => $list, 'page' => $pagination, 'count' => $count];
    }






}