<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->params['title'] = "搜索结果";
$this->params['keywords'] = "";
$this->params['description'] = "";
?>

<?php foreach($list as $val){?>
<div class="box-con">
    <h2 class="box-title">
        <a href="<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" title="<?= $val['title'] ?>"><?= str_ireplace($keyHighlight,$keyreplace,\yii\helpers\MyHelper::truncate_utf8_string($val['title'],29,'..')) ?></a>
    </h2>
    <div class="box-excerpt-m">
        <p><?= str_ireplace($keyHighlight,$keyreplace,\yii\helpers\MyHelper::truncate_utf8_string(\yii\helpers\MyHelper::trimall(strip_tags($val['content'])),150,'...')) ?></p>
    </div>
</div>
<?php }?>

<div class="pageno-m">
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

