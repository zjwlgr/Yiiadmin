<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\MyHelper;
$this->params['title'] = '技术文章管理--列表';
$uri = $_SERVER['REQUEST_URI'];
?>

<div class="bs-example">

    <div class="bs-hander">

        <a href="<?= Url::to(['article/list'])?>" type="button" class="btn btn-default active"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp; 列 表 (<?= $count ?>)</a>
        <a href="<?= Url::to(['article/add'])?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp; 新 增 </a>

        <div class="col-lg-3" style="float: right; padding-right: 0px; padding-left: 8px;">
            <form id="form1_search" name="form1_search" method="get" action="">
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="文章关键字" value="<?= Yii::$app->request->get('search') ?>">
                  <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Go!</button>
                  </span>
            </div>
            </form>
        </div>

    </div>


    <div class="bs-center">

        <table class="table table-margin">
            <thead>
            <tr>
                <td width="8%" class="text-muted">文章作者</td>
                <td width="92%">
                    <a href="<?= Url::to(['article/list'])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('manager'),'')?>">全部</a>&nbsp;&nbsp;&nbsp;
                    <?php foreach($manager_list as $val){?>
                        <a href="<?= Url::to(['article/list','manager' => $val['id']])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('manager'),$val['id'])?>"><?= $val['uname'] ?></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td width="8%" class="text-muted">一级分类</td>
                <td width="92%">
                    <a href="<?= Url::to(['article/list','manager' => Yii::$app->request->get('manager')])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('one'),'')?>">全部</a>&nbsp;&nbsp;&nbsp;
                    <?php foreach($cla_list_one as $val){?>
                        <a href="<?= Url::to(['article/list','one' => $val['id'],'manager' => Yii::$app->request->get('manager')])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('one'),$val['id'])?>"><?= $val['name'] ?></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </td>
            </tr>
            <?php if(!empty(Yii::$app->request->get('one'))){?>
            <tr>
                <td width="8%" class="text-muted">二级分类</td>
                <td width="92%">
                    <a href="<?= Url::to(['article/list','one' => Yii::$app->request->get('one')])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('two'),'')?>">全部</a>&nbsp;&nbsp;&nbsp;
                    <?php foreach($cla_list_two as $val){?>
                        <a href="<?= Url::to(['article/list','one' => Yii::$app->request->get('one'),'two' => $val['id'],'manager' => Yii::$app->request->get('manager')])?>" class="<?=MyHelper::v_v(Yii::$app->request->get('two'),$val['id'])?>"><?= $val['name'] ?></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </td>
            </tr>
            <?php }?>
            </thead>
        </table>

        <table class="table table-bordered table-hover">
            <thead>
            <tr class="active">
                <th width="2%">#</th>
                <th width="23%">标题</th>
                <th width="11%">分类</th>
                <th width="5%">状态</th>
                <th width="4%">排序</th>
                <th width="5%">点击数</th>
                <th width="11%">录入时间</th>
                <th width="7%">操作</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($list as $val){?>
            <tr>
                <th scope="row"><?= $val['id'] ?></th>
                <td><a href="<?= Url::to(['/index/index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" target="_blank" title="<?= $val['title'] ?>">
                        <?= str_ireplace(Yii::$app->request->get('search'),'<span style="color: #FF0000">'.Yii::$app->request->get('search').'</span>',MyHelper::truncate_utf8_string($val['title'],20,'..')) ?>
                    </a></td>
                <td><?= $val['class_one'] ?> / <?= $val['class_two'] ?></td>
                <td><?php
                    if($val['is_release'] == 1){
                        echo '<span class="text-success">已发布</span>';
                    }else{
                        echo '<span class="text-danger">未发布</span>';
                    }
                    ?></td>
                <td><?= $val['sort'] ?></td>
                <td><?= $val['click_num'] ?></td>
                <td><?= date('Y-m-d H:i:s',$val['ctime']) ?></td>
                <td>
                    <a href="<?= Url::to(['article/up', 'id' => $val['id'], 'uri' => $uri]) ?>">编辑</a> |
                    <a href="<?= Url::to(['article/delete', 'id' => $val['id'], 'uri' => $uri]) ?>" class="delete" >删除</a>
                </td>
            </tr>
            <?php }?>

            </tbody>
        </table>

        <?php if($count == 0){?>
            <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-info-sign glyphicon-pos-2"></span> 暂无信息！</div>
        <?php }?>

        <?php
        echo LinkPager::widget([
            'pagination' => $page,
        ]);
        ?>
    </div>

</div>
