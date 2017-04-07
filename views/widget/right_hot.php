<?php use yii\helpers\Url;?>
<div class="box-con hot-list">
    <dl>
        <span class="glyphicon glyphicon-list"></span>&nbsp;Hot
    </dl>
    <ul>
        <?php foreach($params as $key => $val){?>
        <li><span class="glyphicon glyphicon-unchecked"></span><a href="<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" title="<?= $val['title'] ?>"><?= \yii\helpers\MyHelper::truncate_utf8_string($val['title'],17,'..') ?></a></li>
        <?php }?>
    </ul>
</div>