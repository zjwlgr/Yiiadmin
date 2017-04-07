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

<?php foreach($list as $val){?>
<div class="box-con">
    <h2 class="box-title">
        <a href="<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>" title="<?= $val['title'] ?>"><?= \yii\helpers\MyHelper::truncate_utf8_string($val['title'],29,'..') ?></a>
    </h2>
    <div class="box-excerpt-m" onclick="window.location.href='<?= Url::to(['index/content', 'id' => $val['id'], 'one' => strtolower($val['class_one']), 'two' => strtolower($val['class_two'])]) ?>'">
        <p><?= \yii\helpers\MyHelper::truncate_utf8_string(\yii\helpers\MyHelper::trimall(strip_tags($val['content'])),150,'...') ?></p>
    </div>
    <div class="box-twig">
        <a href="<?= Url::to(['index/list', 'class' => strtolower($val['class_one'])]) ?>" title="<?= $val['class_one'] ?>"><?= $val['class_one'] ?></a>&nbsp;<a href="<?= Url::to(['index/list', 'class' => strtolower($val['class_two'])]) ?>" title="<?= $val['class_two'] ?>"><?= $val['class_two'] ?></a>
        <span class="comments-wrapper"><span class="glyphicon glyphicon-eye-open my-eye-open"></span><?= $val['click_num'] ?></span>
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