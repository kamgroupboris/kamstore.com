<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppBasic extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/reset.css',
        'css/style.css',
     //   'css/bootstrap.min.css',
        'css/style1.css',
        'css/jquery.mCustomScrollbar.css',
        'css/castom.css',
    ];
    public $js = [
        'js/jquery.mobile.custom.min.js',
        'js/snap.svg-min.js',
        'js/main.js',
        'js/index.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
       'js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];


}
