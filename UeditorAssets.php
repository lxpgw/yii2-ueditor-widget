<?php
/**
 * Lepture Markdown Editor assets class file
 *
 * @author Evgeniy Kuzminov
 * @license MIT License
 * http://stdout.in
 */
namespace xj\ueditor;

use yii\web\AssetBundle;
use yii;

class UeditorAssets extends AssetBundle
{
	public $sourcePath = '@xj-ueditor/assets';
	public $basePath = '@webroot/assets';
	public $js = [
		'js/ueditor.config.js',
		'js/ueditor.all.js',
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