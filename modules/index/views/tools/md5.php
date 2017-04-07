<?php
use yii\helpers\Url;
use app\assets\ToolsAsset;
ToolsAsset::register($this);
$this->params['title'] = 'Md5Encrypt - Tools';
?>

<ol class="breadcrumb my-breadcrumb">
    <span class="glyphicon glyphicon-log-out"></span>
    <li><a href="/"><strong>Home</strong></a></li>
    <li><a href="<?= Url::to(['/index/tools/index']) ?>">Tools</a></li>
    <li><a href="<?= Url::to(['/index/tools/unix']) ?>" title="Md5加密工具">Md5 encrypt</a></li>
</ol>

<div class="container-fluid tools-main">


    <div class="panel-body">
        <!--内容块开始-->
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">En-Before</span>
            <input type="text" class="form-control" id="str" placeholder="Text to encrypt
" aria-describedby="basic-addon1">
        </div>

        <div class="input-group" style="margin-top: 20px;">
            <span class="input-group-addon" id="basic-addon1">En-After&nbsp;</span>
            <input type="text" class="form-control" id="estr" placeholder="Encrypted text
" aria-describedby="basic-addon1">
        </div>
        <div class="btn-group" role="group" aria-label="..." style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" onclick="md5encode();">Encrypt</button>
            <button type="button" class="btn btn-danger" onclick="Empty();">Empty</button>
        </div>

        <!--内容块结束-->
    </div>


</div>

<div class="panel-footer pading-panel" id="Canvas">
    <span class="text-muted"></span>
</div>