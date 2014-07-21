yii2-ueditor-widget
===================


composer.json
-----
```json
"require": {
        "xj/yii2-ueditor-widget": "*"
},
```

example:
-----
```php
<?php
//外部TAG
echo Html::tag('script', $model->username, [
    'id' => Html::getInputId($model, 'username'),
    'name' => Html::getInputName($model, 'username'),
    'type' => 'text/plain',
]);
echo Ueditor::widget([
    'model' => $model,
    'renderTag' => false,
    'attribute' => 'username',
    'readyEvent' => 'console.log("example1 ready")',
    'jsOptions' => [
        'autoHeightEnable' => true,
        'autoFloatEnable' => true
    ],
]);
?>


<?php
//Widget直接渲染Tag
echo Ueditor::widget([
    'model' => $model,
    'renderTag' => true,
    'name' => 'customName',
    'style' => 'height:400px;width:700px;',
    'attribute' => 'password',
    'style' => 'width:100%',
    'readyEvent' => 'console.log("example2 ready")',
    'jsOptions' => [
        'autoHeightEnable' => true,
        'autoFloatEnable' => true
    ],
]);
?>
```

Action:
----
```php
public function actions() {
return [
    'upload' => [
        'class' => \xj\ueditor\actions\Upload::className(),
        'uploadBasePath' => '@frontend/web/upload', //file system path
        'uploadBaseUrl' => \common\helpers\Url::getWebUrlFrontend('upload'), //web path
	'csrf' => true, //csrf校验
        'configPatch' => [
            'imageMaxSize' => 500 * 1024, //图片
            'scrawlMaxSize' => 500 * 1024, //涂鸦
            'catcherMaxSize' => 500 * 1024, //远程
            'videoMaxSize' => 1024 * 1024, //视频
            'fileMaxSize' => 1024 * 1024, //文件
            'imageManagerListPath' => '/', //图片列表
            'fileManagerListPath' => '/', //文件列表
        ],
        'pathFormat' => [
            'imagePathFormat' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',
            'scrawlPathFormat' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',
            'snapscreenPathFormat' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',
            'snapscreenPathFormat' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',
            'catcherPathFormat' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',
            'videoPathFormat' => 'video/{yyyy}{mm}{dd}/{time}{rand:6}',
            'filePathFormat' => 'file/{yyyy}{mm}{dd}/{time}{rand:6}',
        ],
    ],
];
}
```
