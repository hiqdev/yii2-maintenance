<?php

namespace hiqdev\maintenance;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Asset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/style.css',
        'css/flipclock.css'
    ];

    public $js = [
        'js/flipclock.js',
    ];

    public $depends = [
        JqueryAsset::class,
        BootstrapAsset::class,
    ];
}
