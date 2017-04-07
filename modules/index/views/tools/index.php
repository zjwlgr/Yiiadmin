<?php
use yii\helpers\Url;
use app\assets\ToolsAsset;
ToolsAsset::register($this);
$this->params['title'] = 'JsonFormat - Tools';
?>

<ol class="breadcrumb my-breadcrumb">
    <span class="glyphicon glyphicon-log-out"></span>
    <li><a href="/"><strong>Home</strong></a></li>
    <li><a href="<?= Url::to(['/index/tools/index']) ?>">Tools</a></li>
    <li><a href="<?= Url::to(['/index/tools/index']) ?>" title="JSON格式化工具">JSON Format</a></li>
</ol>

<div class="container-fluid tools-main">
    <textarea id="RawJson" name="RawJson" class="form-control" rows="10" style="width: 100%;" spellcheck="false" placeholder="Enter JSON to validate"></textarea>

    <div class="btn-group tools-btn-group">
        <button type="button" class="btn btn-primary" onclick="Process()">Format</button>
        <button type="button" class="btn btn-danger" onclick="EmptyInput()">Empty</button>
    </div>
</div>

<div class="panel-footer pading-panel" id="Canvas">
    <span class="text-muted">JSON Formatted Display Area...</span>
</div>