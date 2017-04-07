<?php
use yii\helpers\Url;

$this->params['title'] = $find['title'].' - '.$find['class_one'].' - '.$find['class_two'];
$this->params['keywords'] = $find['class_one'].','.$find['class_two'].','.$find['title'];
$this->params['description'] = \yii\helpers\MyHelper::truncate_utf8_string(\yii\helpers\MyHelper::trimall(strip_tags($find['content'])),200,'');
?>


<!--<script type="text/javascript" src="/public/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<link rel="stylesheet" href="/public/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" type="text/css" />
<script>SyntaxHighlighter.all();</script>-->


<div class="box-con">
    <h2 class="box-title box-content"><?= $find['title'] ?></h2>
    <div class="box-twig twig-color">
        <a href="<?= Url::to(['index/list', 'class' => strtolower($find['class_one'])]) ?>" title="<?= $find['class_one'] ?>"><?= $find['class_one'] ?></a>&nbsp;<a href="<?= Url::to(['index/list', 'class' => strtolower($find['class_two'])]) ?>" title="<?= $find['class_two'] ?>"><?= $find['class_two'] ?></a>
        <span class="comments-wrapper"><span class="glyphicon glyphicon-eye-open my-eye-open"></span><?= $find['click_num'] ?></span>
    </div>
    <div class="box-excerpt box-minhet">

        <?= $find['content'] ?>

    </div>

    <div class="box-nextup">
        上一篇：
        <?php if(empty($up)){echo '<span class="text-muted">没有了</span>';}else{?>
            <a href="<?= Url::to(['content', 'id' => $up['id'], 'one' => strtolower($up['class_one']), 'two' => strtolower($up['class_two'])]) ?>" title="<?= $up['title'] ?>"><?= \yii\helpers\MyHelper::truncate_utf8_string($up['title'],38,'..') ?></a>
        <?php }?>
    </div>
    <div class="box-nextup">
        下一篇：
        <?php if(empty($next)){echo '<span class="text-muted">没有了</span>';}else{?>
            <a href="<?= Url::to(['content', 'id' => $next['id'], 'one' => strtolower($next['class_one']), 'two' => strtolower($next['class_two'])]) ?>" title="<?= $next['title'] ?>"><?= \yii\helpers\MyHelper::truncate_utf8_string($next['title'],38,'..') ?></a>
        <?php }?>
    </div>


</div>


