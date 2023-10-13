<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 17:51:56
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin-style.css',
    ];
    public $js = [
    ];

    public $depends = [
        //BootstrapAsset::class,
        YiiAsset::class,
        AdminLteAsset::class,
    ];
}
