<?php
use yii\helpers\Url;
use app\assets\IndexbaseAsset;
IndexbaseAsset::register($this);

$this->title = $this->params['title'].' - '.\Yii::$app->params['weburl'];
$this->params['keywords'] = '';
$this->params['description'] = '';
$this->beginContent('@app/views/layouts/base.php');

?>

    <header class="headers-m">
        <div class="container-fluid">
            <div class="row my-row-m">
                <div class="col-xs-4 no-padding-m">
                    <a href="http://m.form1.cn"><img src="<?= Url::to('/public/image/logo.png',true) ?>" height="26" alt="m.form1.cn" /></a>
                </div>
                <div class="col-xs-8 no-padding-m">
                    <form id="form1" name="form1" method="get" action="<?= Url::to(['index/search']) ?>" role="search">
                    <span class="glyphicon glyphicon-search my-glsearch-m" id="submit_search-m"></span>
                    <input type="search" name="search" value="<?= Yii::$app->request->get('search') ?>" class="form-control input-sm-m" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="nav-m">
            <div class="scroll-m">
            <ul>
                <li><a href="http://m.form1.cn"<?= empty($this->params['nav_active_m']) ? ' class="cur"' : '' ?>>Home</a></li>
                <?php foreach($this->params['nav_list'] as $key => $val){
                    if($val['name'] == 'Javascript') $val['name'] = 'JS';
                    ?>
                    <li><a<?= $this->params['nav_active_m'] == strtolower($val['name']) ? ' class="cur"' : '' ?> href="<?= Url::to(['index/list', 'class' => strtolower($val['name'])]) ?>"><?= $val['name'] ?></a></li>
                <?php }?>
            </ul>
            </div>
        </div>
    </header>

    <section class="section-m">
        <?= $content ?>
    </section>


    <footer class="footers-m">
        Copyright © 2016-<?=date('Y')?> by <a href="http://<?=\Yii::$app->params['weburl']?>" target="_blank">m.<?=\Yii::$app->params['weburl']?></a>
    </footer>

<?php $this->endContent(); ?>