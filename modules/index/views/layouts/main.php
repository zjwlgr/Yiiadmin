<?php
use app\assets\IndexbaseAsset;
IndexbaseAsset::register($this);

$this->title = $this->params['title'].' - '.\Yii::$app->params['webname'].' - '.\Yii::$app->params['weburl'];

$this->beginContent('@app/views/layouts/base.php');
?>

    <header class="headers">
        <div class="container-fluid form1-fluid">

        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse my-collapse">
                    <ul class="nav navbar-nav my-nav">
                        <li class="active"><a href="#">Start Here</a></li>
                        <li><a href="#">Document</a></li>
                        <li><a href="#">Tools</a></li>
                        <li><a href="#">Resource</a></li>
                    </ul>
                    <!--<form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>-->
                </div>
            </div>
        </nav>
    </header>

<?= $content ?>

<?php $this->endContent(); ?>