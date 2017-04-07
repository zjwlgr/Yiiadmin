<?php
use yii\helpers\Url;
use app\assets\IndexbaseAsset;
IndexbaseAsset::register($this);

$this->title = $this->params['title'].' - '.\Yii::$app->params['weburl'];
$this->params['keywords'] = empty($this->params['keywords']) ? '' : $this->params['keywords'];
$this->params['description'] = empty($this->params['description']) ? '' : $this->params['description'];


$this->beginContent('@app/views/layouts/base.php');
?>

    <header class="headers">
        <div class="container-fluid form1-fluid">
            <div class="row my-row">
                <div class="col-md-4">
                    <a href="/"><img src="<?= Url::to('/public/image/logo.png',true) ?>" width="152" height="33" alt="form1.cn" /></a>
                </div>
                <div class="col-md-8 progress-eve">
                    Make a little <a href="<?= Url::to('/style-html5-31.html',true) ?>">progress</a> every day
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse my-collapse">
                    <ul class="nav navbar-nav my-nav">
                        <li<?= empty($this->params['nav_active']) ? ' class="active"' : '' ?>><a href="/">Home</a></li>
                        <?php foreach($this->params['nav_list'] as $key => $val){?>
                            <li<?= $this->params['nav_active'] == strtolower($val['name']) ? ' class="active"' : '' ?>><a href="<?= Url::to(['index/list', 'class' => strtolower($val['name'])]) ?>"><?= $val['name'] ?></a></li>
                        <?php }?>

                        <li<?= $this->params['nav_active'] == 'tools' ? ' class="active"' : '' ?> id="dropdown">

                            <a href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="backcolor">
                                Tools <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= Url::to(['/index/tools/index']) ?>">JSON format</a></li>
                                <li><a href="<?= Url::to(['/index/tools/unix']) ?>">Unix time format</a></li>
                                <li><a href="<?= Url::to(['/index/tools/md5']) ?>">MD5 encrypt</a></li>
                                <li><a href="<?= Url::to(['/index/tools/url']) ?>">URL encoding</a></li>
                                <!--<li><a href="#">JS Encryption and decryption</a></li>
                                <li><a href="#">Send HTTP request</a></li>-->
                            </ul>

                        </li>



                    </ul>
                    <form id="form1" name="form1" method="get" class="navbar-form navbar-right my-form1" action="<?= Url::to('/search.html',true) ?>" role="search">
                        <div class="form-group">
                            <span class="glyphicon glyphicon-search my-glsearch" id="submit_search"></span>
                            <input type="text" id="search" name="search" class="form-control my-form1-control" placeholder="Search" value="<?= Yii::$app->request->get('search') ?>">
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <section class="section">
        <?= $content ?>
    </section>

    <footer class="footers">
        <div class="row">
            <div class="col-md-6">
                Copyright © <?=date('Y')?> by <?=\Yii::$app->params['webname']?> <a href="http://<?=\Yii::$app->params['weburl']?>" target="_blank"><?=\Yii::$app->params['weburl']?></a> · All Rights Reserved
            </div>
            <div class="col-md-6 my-email">
                Email: <a href="mailto:market@form1.cn">market@form1.cn</a>
            </div>
        </div>
    </footer>

    <!-- Modal 冗余Modal... -->
    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h5 class="modal-title" id="myModalLabel">System message</h5>
                </div>
                <div class="modal-body text-danger">Please enter keyword!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 冗余Modal... -->
    <div class="modal fade bs-example-modal-sm" id="jsonModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h5 class="modal-title" id="myModalLabel">System message</h5>
                </div>
                <div class="modal-body text-danger">JSON syntax error!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>



<?php $this->endContent(); ?>