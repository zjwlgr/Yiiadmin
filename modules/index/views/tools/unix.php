<?php
use yii\helpers\Url;
use app\assets\ToolsAsset;
ToolsAsset::register($this);
$this->params['title'] = 'UnixTimeFormat - Tools';
?>

<ol class="breadcrumb my-breadcrumb">
    <span class="glyphicon glyphicon-log-out"></span>
    <li><a href="/"><strong>Home</strong></a></li>
    <li><a href="<?= Url::to(['/index/tools/index']) ?>">Tools</a></li>
    <li><a href="<?= Url::to(['/index/tools/unix']) ?>" title="Unix时间格式化工具">Unix time format</a></li>
</ol>

<div class="container-fluid tools-main">


    <div class="panel-body">
        <!--内容块开始-->
        <div style="width: 100%; overflow: hidden">
            <div class="input-group" style="float: left;width:503px;">
                <span class="input-group-addon" id="basic-addon1">Current timestamp</span>
                <input type="text" class="form-control font-weight" id="now_timestamp" placeholder="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group" style="float: left;width:503px; margin-left: 10px;">
                <span class="input-group-addon" id="basic-addon1">Current time</span>
                <input type="text" class="form-control font-weight" id="now_times" placeholder="" aria-describedby="basic-addon1">
            </div>
        </div>

        <div style="width: 100%; margin-top: 30px; ">
            <p>Unix timestamp to Beijing time</p>
            <div class="input-group" style="float: left;width:300px;">
                <span class="input-group-addon" id="basic-addon1">Unix timestamp</span>
                <input type="text" class="form-control font-weight" style="width:280px" id="unixtime" placeholder="Timestamp needed to convert" aria-describedby="basic-addon1">
            </div>
            <button type="button" class="btn btn-primary" style="float: left;width:150px; margin-left: 10px;" id="toGMT">Conversion</button>
            <div class="input-group" style="float: left;width:300px;margin-left: 10px;">
                <span class="input-group-addon" id="basic-addon1">&nbsp;Beijing time&nbsp;</span>
                <input type="text" class="form-control font-weight" id="result_GMT" style="width:280px" placeholder="Converted timestamp" aria-describedby="basic-addon1">
            </div>
        </div>

        <div style="clear: both;"></div>

        <div style="width: 100%; margin-top: 30px; ">
            <p>Beijing time to Unix timestamp</p>
            <div class="input-group" id="bjc1" style="float: left;width:433px; margin-top: 3px;">
                <input type="text" class="bjtime" id="year" style="width: 58px;"><span>Y&nbsp;</span>
                <input type="text" class="bjtime" id="month"><span>M&nbsp;</span>
                <input type="text" class="bjtime" id="day"><span>D&nbsp;</span>
                <input type="text" class="bjtime" id="hour"><span>H&nbsp;</span>
                <input type="text" class="bjtime" id="minute"><span>I&nbsp;</span>
                <input type="text" class="bjtime" id="second"><span>S</span>
            </div>
            <button type="button" class="btn btn-primary" style="float: left;width:150px" id="toUNIX">Conversion </button>
            <div class="input-group" style="float: left;width:300px;margin-left: 10px;">
                <span class="input-group-addon" id="basic-addon1">Unix timestamp</span>
                <input type="text" class="form-control font-weight" id="result_unix" style="width:280px" placeholder="Conversion time" aria-describedby="basic-addon1">
            </div>
        </div>

        <!--内容块结束-->
    </div>


</div>

<div class="panel-footer pading-panel" id="Canvas">
    <span class="text-muted"></span>
</div>