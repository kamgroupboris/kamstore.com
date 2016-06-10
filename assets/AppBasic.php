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
        'catalog/view/javascript/bootstrap/css/bootstrap.min.css',
        'catalog/view/javascript/font-awesome/css/font-awesome.min.css',
        'catalog/view/theme/so-maxshop7/css/lib.css',
        'catalog/view/theme/so-maxshop7/css/theme-cyan.css',
        'catalog/view/javascript/so_deals/css/style.css',
        'catalog/view/javascript/so_deals/css/css3.css',
        'catalog/view/javascript/so_deals/css/owl.carousel.css',
        'catalog/view/javascript/so_category_slider/css/slider.css',
        'catalog/view/javascript/so_category_slider/css/animate.css',
        'catalog/view/javascript/so_latest_blog/css/style.css',
        'catalog/view/javascript/so_latest_blog/css/animate.css',
        'catalog/view/javascript/so_searchpro/css/so_searchpro.css',
        'catalog/view/javascript/so_megamenu/so_megamenu.css',
        'catalog/view/javascript/so_megamenu/wide-grid.css',
        'catalog/view/javascript/jquery/owl-carousel/owl.carousel.css',
        'catalog/view/javascript/jquery/owl-carousel/owl.transitions.css',
        'catalog/view/theme/so-maxshop7/css/responsive.css',
        'catalog/view/javascript/shortcode/shortcodes.css',
		
		'catalog/view/theme/so-maxshop7/js/lightslider/lightslider.css',
    ];
    public $js = [
  //      'catalog/view/javascript/jquery/jquery-2.1.1.min.js',
        'catalog/view/javascript/jquery/accordion.js',
        'catalog/view/javascript/bootstrap/js/bootstrap.min.js',
        'catalog/view/theme/so-maxshop7/js/libs.js',
        'catalog/view/theme/so-maxshop7/js/jquery.jcarousellite.js',
        'catalog/view/javascript/jquery/countdown/jquery.countdown.js',
        'catalog/view/theme/so-maxshop7/js/common.js',
        'catalog/view/theme/so-maxshop7/js/so.custom.js',
        'catalog/view/theme/so-maxshop7/js/scrollreveal.min.js',
        'catalog/view/theme/so-maxshop7/js/jquery.unveil.js',
        'catalog/view/javascript/so_deals/js/owl.carousel.js',
        'catalog/view/javascript/so_megamenu/so_megamenu.js',
		'catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js',
        'catalog/view/javascript/shortcode/shortcodes.js',
		
		'catalog/view/javascript/jquery/datetimepicker/moment.js',
		'catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js',
		'catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js',
		'catalog/view/theme/so-maxshop7/js/lightslider/lightslider.js',
		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}
