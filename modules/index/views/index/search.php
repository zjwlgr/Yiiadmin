<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->params['title'] = "搜索结果";
$this->params['keywords'] = "";
$this->params['description'] = "";
?>


<div class="row">
    <div class="col-md-8 my-colmd-8">

        <ol class="breadcrumb my-breadcrumb">
            <span class="glyphicon glyphicon-log-out"></span>
            <li><a href="/"><strong>Home</strong></a></li>
            <li>搜索结果</li>
            <li class="active"><?= \yii\helpers\MyHelper::truncate_utf8_string($search,20,'...') ?></li>
        </ol>

        <?php foreach($list as $val){?>
            <div class="box-con">
                <h2 class="box-title box-title-bottom">
                    <a href="<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" title="<?= $val['title'] ?>"><?= str_ireplace($keyHighlight,$keyreplace,\yii\helpers\MyHelper::truncate_utf8_string($val['title'],29,'..')) ?></a>
                </h2>
                <div class="box-excerpt">
                    <?= str_ireplace($keyHighlight,$keyreplace,\yii\helpers\MyHelper::truncate_utf8_string(\yii\helpers\MyHelper::trimall(strip_tags($val['content'])),143,'...')) ?>
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
            <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-info-sign glyphicon-pos-2"></span> 抱歉，没有找到你想要的！</div>
        <?php }?>

    </div>

    <div class="col-md-4 my-colmd-4">
        <?= \app\commands\MyWidget::widget(['type' => 'right_label']) ?>
        <?= \app\commands\MyWidget::widget(['type' => 'right_hot']) ?>
    </div>
</div>