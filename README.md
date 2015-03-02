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
echo \xj\ueditor\Html::tag('script', $model->username, [
    'id' => Html::getInputId($model, 'username'),
    'name' => Html::getInputName($model, 'username'),
    'type' => 'text/plain',
]);
echo Ueditor::widget([
    'model' => $model,
    'attribute' => 'username',
    'renderTag' => false,
    'jsOptions' => [
        'serverUrl' => common\helpers\Url::to(['upload']),
        'autoHeightEnable' => true,
        'autoFloatEnable' => true
    ],
]);
?>


<?php
//Widget直接渲染Tag
echo \xj\ueditor\Ueditor::widget([
    'model' => $model,
    'attribute' => 'password',
    'name' => 'customName',
    'value' => 'content',
    'style' => 'width:100%;height:400px',
    'renderTag' => true,
    'readyEvent' => 'console.log("example2 ready")',
    'jsOptions' => [
        'serverUrl' => yii\helpers\Url::to(['upload']),
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
        'uploadBasePath' => '@webroot', //file system path
        'uploadBaseUrl' => '@web', //web path
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
        'beforeUpload' => function($action) {
//          throw new \yii\base\Exception('error message'); //break
        },
        'afterUpload' => function($action) {
            /*@var $action \xj\ueditor\actions\Upload */
            
            var_dump($action->result);
            //  'state' => string 'SUCCESS' (length=7)
            //  'url' => string '/attachment/201109/1425310269294251.jpg' (length=61)
            //  'relativePath' => string '201109/1425310269294251.jpg' ()
            //  'title' => string '1425310269294251.jpg' (length=20)
            //  'original' => string 'Chrysanthemum.jpg' (length=17)
            //  'type' => string '.jpg' (length=4)
            //  'size' => int 879394
            
            throw new \yii\base\Exception('error message'); //break
        },
    ],
];
}
```
