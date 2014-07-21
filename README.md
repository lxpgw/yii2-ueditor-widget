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
            'imageMaxSize' => 102400, /* 上传大小限制，单位B */
            'scrawlMaxSize' => 102400, /* 上传大小限制，单位B */
            'imageManagerListPath' => '/', //图片列表
            'fileManagerListPath' => '/', //文件列表
        ],
        'pathFormat' => [
            'imagePathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'scrawlPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'snapscreenPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'catcherPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'snapscreenPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'catcherPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'videoPathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
            'filePathFormat' => '{yyyy}{mm}{dd}/{time}{rand:6}',
        ],
    ],
];
}
```
