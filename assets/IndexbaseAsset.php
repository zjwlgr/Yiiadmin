<?php
namespace app\assets;

use yii\web\AssetBundle;

class IndexbaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/index_style.css',
    ];
    public $js = [
        'public/js/index_script.js'
    ];
    public $depends = [
        'app\assets\BootstrapAsset',
    ];
}
