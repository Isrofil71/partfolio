<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
        'jobboard/css/custom-bs.css',
        'jobboard/css/jquery.fancybox.min.css',
        'jobboard/css/bootstrap-select.min.css',
        'jobboard/fonts/icomoon/style.css',
        'jobboard/fonts/line-icons/style.css',
        'jobboard/css/owl.carousel.min.css',
        'jobboard/css/animate.min.css',
        'jobboard/css/style.css',
        'https://use.fontawesome.com/releases/v5.3.1/css/all.css',
        'css/site.css',
    ];
    public $js = [

//        'jobboard/js/jquery.min.js',
        'jobboard/js/bootstrap.bundle.min.js',
        'jobboard/js/isotope.pkgd.min.js',
        'jobboard/js/stickyfill.min.js',
        'jobboard/js/jquery.fancybox.min.js',
        'jobboard/js/jquery.easing.1.3.js',

        'jobboard/js/jquery.waypoints.min.js',
        'jobboard/js/jquery.animateNumber.min.js',
        'jobboard/js/owl.carousel.min.js',

        'jobboard/js/bootstrap-select.min.js',

        'jobboard/js/custom.js',
        'https://use.fontawesome.com/releases/v5.3.1/js/all.js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

