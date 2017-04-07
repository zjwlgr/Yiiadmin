<?php use yii\helpers\Url;?>
<div class="box-con class-list">
    <dl>
        <span class="glyphicon glyphicon-align-center"></span>&nbsp;Label
    </dl>
    <ul>
        <?php foreach($params as $key => $val){?>
        <li><a href="<?= Url::to(['index/list', 'class' => strtolower($val['name'])]) ?>" title="<?= $val['name'] ?>"><?= $val['name'] ?></a></li>
        <?php }?>
    </ul>
</div>