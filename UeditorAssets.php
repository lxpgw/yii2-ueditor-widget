<?php

/**
 * 
 */

namespace xj\ueditor;

use yii\web\AssetBundle;
use yii;

class UeditorAssets extends AssetBundle {

    public $sourcePath = '@xj-ueditor/assets';
    public $basePath = '@webroot/assets';
    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
    public $css = [
            //'css/editor.css',
    ];
    public $depends = [
            //'yii\web\JqueryAsset',
    ];

    public function init() {
        Yii::setAlias('@xj-ueditor', __DIR__);
        return parent::init();
    }

}
