<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/bootstrap.css',
        'public/css/bootstrap-reboot.css',
        'public/css/bootstrap-grid.css',
        'public/css/style.css',
    ];
    public $js = [
   //     "public/js/jquery-3.3.1.min.js",
    //    "public/js/bootstrap.js",

    ];
    public $depends = [

    ];
}