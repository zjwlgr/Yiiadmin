<?php
use yii\helpers\Url;
use app\assets\ToolsAsset;
ToolsAsset::register($this);
$this->params['title'] = 'UrlEncoding - Tools';
?>

<ol class="breadcrumb my-breadcrumb">
    <span class="glyphicon glyphicon-log-out"></span>
    <li><a href="/"><strong>Home</strong></a></li>
    <li><a href="<?= Url::to(['/index/tools/index']) ?>">Tools</a></li>
    <li><a href="<?= Url::to(['/index/tools/unix']) ?>" title="Url编码">Url encoding</a></li>
</ol>

<div class="container-fluid tools-main">


    <div class="panel-body">
        <!--内容块开始-->
        <div>
            <textarea id="content" name="RawJson" class="form-control" rows="4" style="width: 100%;" spellcheck="false" placeholder="Enter Escape string"></textarea>
        </div>
        <div class="btn-group" role="group" aria-label="..." style="margin-top: 5px;">
            <button type="button" class="btn btn-primary" onclick="encode();">Encoding</button>
            <button type="button" class="btn btn-primary" onclick="decode();">Decoding</button>
            <button type="button" class="btn btn-primary" onclick="change();">Exchange</button>
            <button type="button" class="btn btn-danger" onclick="Empty_url();">Empty</button>
        </div>


        <div style="padding-top: 15px;">
            <span>encodeURI</span>
            <textarea id="result" name="RawJson" class="form-control" rows="4" style="width: 100%;" spellcheck="false" placeholder="Encrypted or decrypted Escape string"></textarea>
        </div>


        <div style="padding-top: 15px;" id="res2">
            <span>encodeURIComponent,<font color="red">Special symbol coding</font></span>
            <textarea id="result2" name="RawJson" class="form-control" rows="4" style="width: 100%;" spellcheck="false" placeholder="Encrypted or decrypted Escape string"></textarea>
        </div>
        <!--内容块结束-->
    </div>


</div>

<div class="panel-footer pading-panel" id="Canvas">
    <span class="text-muted"></span>
</div>