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
    public $js = [];
    public $css = [
//'css/editor.css',
    ];
    public $depends = [
//'yii\web\JqueryAsset',
    ];

    private function getJs() {
        return [
            YII_DEBUG ? 'ueditor.config.js' : 'ueditor.config.min.js',
            YII_DEBUG ? 'ueditor.all.js' : 'ueditor.all.min.js',
        ];
    }

    public function init() {
        Yii::setAlias('@xj-ueditor', __DIR__);
        if (empty($this->js)) {
            $this->js = $this->getJs();
        }
        return parent::init();
    }

}
