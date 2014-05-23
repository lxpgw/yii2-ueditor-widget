yii2-ueditor-widget
===================

<?php
echo Ueditor::widget([
    'model' => $model,
    'attribute' => 'password',
    'jsOptions' => [
        'autoHeightEnable' => true,
        'autoFloatEnable' => true
    ],
]);
?>
