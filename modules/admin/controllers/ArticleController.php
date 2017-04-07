<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\modules\admin\models\Article;
use app\modules\admin\models\ClassInfo;
use app\modules\admin\models\ManagerInfo;

class ArticleController extends CommonController
{

    public function actionAdd(){
        $Article = new Article();
        $ArticlePost = Yii::$app->request->post('Article');
        $Article->attributes = $ArticlePost;
        if($Article->validate() && $Article->load(Yii::$app->request->post())){
            if(!empty($_FILES['UploadForm']['name']['imageFile'])) {//如果用户选择了本地文件
                $upload = new UploadForm();
                $upload->extensions = ['jpg', 'gif', 'png', 'jpeg'];
                $upload->maxsize = 3000000;
                $upload->savePath = 'upload/projector';
                $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
                $result = $upload->upload();//运行上传
            }else{
                $result['code'] = 0;$result['url'] = '';
            }
            if ($result['code'] == 0) {// 文件上传成功
                $ArticlePost['image'] = $result['url'];
                $result = Article::add($ArticlePost);
                if($result){
                    Yii::mysuccess('文章新增成功！',Url::to(['article/list']));
                }
            }else{
                Yii::myerror($result['error'],'',5);
            }
        }else {
            $cla_list = ClassInfo::lists(135);
            $count = Article::count();
            return $this->render('add',['cla_list' => $cla_list, 'count' => $count]);
        }
    }

    public function actionUp(){
        $Article = new Article();
        $ArticlePost = Yii::$app->request->post('Article');
        $Article->attributes = $ArticlePost;
        if($Article->validate() && $Article->load(Yii::$app->request->post())){
            if(!empty($_FILES['UploadForm']['name']['imageFile'])) {//如果用户选择了本地文件
                $upload = new UploadForm();
                $upload->extensions = ['jpg', 'gif', 'png', 'jpeg'];
                $upload->maxsize = 3000000;
                $upload->savePath = 'upload/projector';
                $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
                $result = $upload->upload();//运行上传
                if ($result['code'] == 0) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] .'/'. $ArticlePost['image_hidden']);
                }
            }else{
                $result['code'] = 0;$result['url'] = '';
            }
            if ($result['code'] == 0) {// 文件上传成功
                $ArticlePost['image'] = empty($result['url']) ? $ArticlePost['image_hidden'] : $result['url'];
                $result = Article::up($ArticlePost);
                if($result){
                    Yii::mysuccess('文章编辑成功！',Yii::$app->request->post('uri'));
                }
            }else{
                Yii::myerror($result['error'],'',5);
            }
        }else {
            $art_one = Article::one(Yii::$app->request->get('id'));
            $cla_list = ClassInfo::lists(135);
            $cla_list_two = ClassInfo::lists($art_one['class_one_id']);
            $count = Article::count();
            return $this->render('up',['cla_list' => $cla_list, 'cla_list_two' => $cla_list_two, 'count' => $count, 'art_one' => $art_one]);
        }
    }

    public function actionList(){
        $page = Yii::$app->request->get('page');
        $search = Yii::$app->request->get('search');
        $one = Yii::$app->request->get('one');
        $two = Yii::$app->request->get('two');
        $manager = Yii::$app->request->get('manager');

        $where['search'] = $search;
        $where['one'] = $one;
        $where['two'] = $two;
        $where['manager'] = $manager;

        $Article = Article::lists(20,$page,$where);
        $Article['cla_list_one'] = ClassInfo::lists(135);
        $Article['manager_list'] = ManagerInfo::manager_article();
        if(!empty($one)){
            $Article['cla_list_two'] = ClassInfo::lists($one);
        }
        return $this->render('list',$Article);
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $uri = Yii::$app->request->get('uri');
        $art_one = Article::one($id);
        @unlink($_SERVER['DOCUMENT_ROOT'] .'/'. $art_one['image']);
        Article::deletes($id);
        return $this->redirect($uri);
    }

    public function actionAjax_class_two(){
        $cla_list = ClassInfo::lists(Yii::$app->request->post('id'));
        return $this->renderPartial('ajax_class_two',['cla_list' => $cla_list]);
    }





}
