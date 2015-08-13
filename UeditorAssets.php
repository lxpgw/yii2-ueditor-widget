<?php namespace lxpgw\ueditor;

use yii\web\AssetBundle;

/**
 * The assets bundle
 *
 * @package lxpgw\ueditor
 * @version 0.1.0
 */
class UeditorAssets extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = ['yii\web\JqueryAsset'];
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
        parent::init();
    }

}
