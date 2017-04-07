<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$title = '';$keywords = '';foreach($ol as $key => $val){
    $title .= $val['name'].' - ';
    $keywords .= $val['name'].',';
}
$this->params['title'] = substr($title,0,-3);
$this->params['keywords'] = substr($keywords,0,-1);
$this->params['description'] = substr($keywords,0,-1);
?>


<div class="row">
    <div class="col-md-8 my-colmd-8">

        <ol class="breadcrumb my-breadcrumb">
            <span class="glyphicon glyphicon-log-out"></span>
            <li><a href="/"><strong>Home</strong></a></li>
            <?php foreach($ol as $key => $val){?>
            <li><a href="<?= Url::to(['index/list', 'class' => strtolower($val['name'])]) ?>"><?= $val['name'] ?></a></li>
            <?php }?>
        </ol>

        <?php foreach($list as $val){?>
        <div class="box-con">
            <div class="box-twig">
                <span class="date"><?= \yii\helpers\MyHelper::en_time($val['ctime']) ?></span>
                <a href="<?= Url::to(['index/list', 'class' => strtolower($val['class_one'])]) ?>" title="<?= $val['class_one'] ?>"><?= $val['class_one'] ?></a>&nbsp;<a href="<?= Url::to(['index/list', 'class' => strtolower($val['class_two'])]) ?>" title="<?= $val['class_two'] ?>"><?= $val['class_two'] ?></a>
                <span class="comments-wrapper">
                    <span class="glyphicon glyphicon-eye-open my-eye-open"></span><?= $val['click_num'] ?>
                </span>
            </div>
            <h2 class="box-title">
                <a href="<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" title="<?= $val['title'] ?>"><?= \yii\helpers\MyHelper::truncate_utf8_string($val['title'],29,'..') ?></a>
            </h2>
            <div class="box-excerpt">
                <?= \yii\helpers\MyHelper::truncate_utf8_string(\yii\helpers\MyHelper::trimall(strip_tags($val['content'])),143,'...') ?>
            </div>
        </div>
        <?php }?>

        <div class="pageno">
            <?php
            echo LinkPager::widget([
                'pagination' => $page,
            ]);
            ?>
        </div>

        <?php if(empty($list)){?>
            <br />
            <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-info-sign glyphicon-pos-2"></span> 暂无信息！</div>
        <?php }?>

    </div>

    <div class="col-md-4 my-colmd-4">
        <?= \app\commands\MyWidget::widget(['type' => 'right_label']) ?>
        <?= \app\commands\MyWidget::widget(['type' => 'right_hot']) ?>
    </div>
</div>