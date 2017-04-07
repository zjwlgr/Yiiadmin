<?php

namespace app\modules\index\controllers;

use Yii;
use app\modules\admin\models\ClassInfo;
use app\modules\admin\models\Article;
use app\commands\Form1Helper;


class IndexController extends CommonController
{

    public function actionIndex(){
        $page = Yii::$app->request->get('page');
        $Article = Article::article_list(30,$page);
        $indexanimation = \Yii::$app->params['indexanimation'];
        $Article['indexanimetion'] = $indexanimation[date("w")];
        return $this->render('index',$Article);
    }

    public function actionContent(){
        $art_id = Yii::$app->request->get('id');
        $find = Article::article_one($art_id);//文章详细
        Article::set_access($art_id);//访问量加1
        $up = Article::next_up($art_id,'up');//上一篇
        $next = Article::next_up($art_id,'next');//下一篇
        return $this->render('content',['find' => $find, 'next' => $next, 'up' => $up]);
    }

    public function actionList(){
        $classname = Yii::$app->request->get('class');
        $page = Yii::$app->request->get('page');
        $cla_one = ClassInfo::name_one($classname);//查询分类ID 例：Array ( [id] => 136 [fid] => 135 [name] => Linux )
        if($cla_one['fid'] == '135'){//如果此分类为一级分类
            $ol = [$cla_one];
        }else{
            $ol = [ClassInfo::one($cla_one['fid']), $cla_one];
        }
        $Article = Article::article_list(30,$page,$cla_one['id']);
        $Article['ol'] = $ol;//位置导航设置
        return $this->render('list',$Article);
    }

    public function actionSearch(){
        $Form1Helper = new Form1Helper();//实例化我的助手类
        $search = Yii::$app->request->get('search');//接收关键字
        $page = Yii::$app->request->get('page');//接收页数
        $sphinxKey = $Form1Helper->scws($search);//返回分词后sphinx所需格式 (sphinx)|(scws)|(中文)|(分词)
        $sphinxIds = $Form1Helper->sphinx($sphinxKey);//返回mysql所需IDS
        if(empty($sphinxKey) || empty($sphinxIds)){$sphinxIds = 1;}//表中没有1，所以会返回空
        $Article = Article::article_list(30,$page,false,$sphinxIds);//model查询返回
        $Article['search'] = str_replace(array("(", ")", "|"),array("","",","),$sphinxKey);//替换分词后符号
        $Article['keyHighlight'] = explode(',',$Article['search']);//得到关键词数组
        $Article['keyreplace'] = (array_map(function ($v){
            return '<span style="color: #FF0000">'.$v.'</span>';},$Article['keyHighlight']));//替换结果数组
        $result = array_flip(explode(',',$sphinxIds));//反转数组
        foreach ($Article['list'] as $k => $v){
            $Article['list'][$k]['idskey'] = $result[$v['id']];//加入返转后的数组，用来排序
        }
        $sort = array(
            'direction' => 'SORT_ASC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
            'field'     => 'idskey',       //排序字段
        );
        $arrSort = array(); foreach($Article['list'] AS $uniqid => $row){
            foreach($row AS $key => $value){
                $arrSort[$key][$uniqid] = $value;
            }
        }
        if($sort['direction']){
            array_multisort($arrSort[$sort['field']], constant($sort['direction']), $Article['list']);
        }//二维数组排序

        return $this->render('search',$Article);
    }
}
