<?php

namespace app\assets;

use rmrevin\yii\fontawesome\NpmFreeAssetBundle;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AdminLteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    /**
     * @var array
     */
    public $js = [
        //"bower_components/jquery/dist/jquery.min.js",
        "bower_components/bootstrap/dist/js/bootstrap.min.js",
        "bower_components/fastclick/lib/fastclick.js",
        "dist/js/adminlte.min.js",
        "bower_components/jquery-sparkline/dist/jquery.sparkline.min.js",
        "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
        "plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
        "bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
        //"bower_components/chart.js/Chart.js",
        //"dist/js/pages/dashboard2.js",
        "dist/js/demo.js",
    ];
    /**
     * @var array
     */
    public $css = [
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'dist/css/AdminLTE.min.css',
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        "bower_components/font-awesome/css/font-awesome.min.css",
        "bower_components/Ionicons/css/ionicons.min.css",
        "bower_components/jvectormap/jquery-jvectormap.css",
        "dist/css/skins/_all-skins.min.css",
    ];
    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
        //BootstrapPluginAsset::class,
        NpmFreeAssetBundle::class,
    ];
}
