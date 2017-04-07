<?php
namespace app\assets;

use yii\web\AssetBundle;

class ToolsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'public/js/tools.js?v=1'
    ];
    public $depends = [
        'app\assets\IndexbaseAsset',
    ];
}
