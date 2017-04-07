<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
/*use app\assets\FocusimgAsset; //焦点图的JS
FocusimgAsset::register($this);*/

$this->params['title'] = 'Home';
$this->params['keywords'] = 'form1,FORM1,文档整理,Mydocument';
$this->params['description'] = '';
?>


<div class="row">
    <div class="col-md-8 my-colmd-8">

        <div class="box-con box-con-pading">
            <div class="box-img boximg-pading">
                <iframe src="<?= $indexanimetion ?>" frameborder="0" scrolling="no" width="720" height="320"></iframe>
                <!--
                HTML5动画：/public/html5/html5-canvas-particle-effect/index.html
                -->
                <!--<div id="solid">
                    <div class="solid0"></div><div class="solid1"></div><div class="solid2"></div>
                    <ul>
                        <li><a href="#"><img src="/public/image/images/240127392039882.png" /></a></li>
                        <li><a href="#"><img src="/public/image/images/20150130105818619.png" /></a></li>
                        <li><a href="#"><img src="/public/image/images/2015072317115535.png" /></a></li>
                    </ul>
                    <div id="btt"><span></span> <span></span> <span></span></div>
                </div>-->
            </div>
        </div>

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

    </div>

    <div class="col-md-4 my-colmd-4">
        <?= \app\commands\MyWidget::widget(['type' => 'right_label']) ?>
        <?= \app\commands\MyWidget::widget(['type' => 'right_hot']) ?>
    </div>
</div>