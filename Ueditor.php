<?php

namespace xj\ueditor;

use xj\ueditor\UeditorAssets;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

/**
 * Ueditor Widget
<<<<<<< HEAD
 *
 * For example,
 *
 * echo Ueditor::widget([
 *  'model' => $model,
 *  'attribute' => 'content',
 *  'style' => 'width:100%',
 *  'jsOptions' => [
 *    'autoHeightEnable' => true,
 *    'autoFloatEnable' => true
 *  ],
 * ]);
 * 
 * 
 * 
=======
>>>>>>> FETCH_HEAD
 */
class Ueditor extends InputWidget {

    /**
     * UE初始化目标ID
     * @var string 
     */
    public $id;

    /**
     * UE默认值
     * @var string 
     */
    public $value;

    /**
     * 表单字段名
     * @var string 
     */
    public $name;
    
    /**
     * Tag/ScriptTag HtmlStyle
     * @var style
     */
    public $style;
    
    /**
     * 是否渲染Tag
     * @var string/bool
     */
    public $renderTag = true;
   
    /**
     * UE 参数
     * @var array
     */
    public $jsOptions = [];

    /**
     * UE.ready(function(){
     * //nothing
     * //alert('editor ready');
     * });
     * @var string 
     */
<<<<<<< HEAD
    public $style;
=======
    public $readyEvent;
>>>>>>> FETCH_HEAD

    /**
     * Initializes the widget.
     */
    public function init() {
        parent::init();
        if (empty($this->id)) {
            $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
        if (empty($this->name)) {
            $this->name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->id;
        }
        if (empty($this->value)) {
            if ($this->hasModel()) {
                if ($this->model->hasAttribute($this->attribute)) {
                    $this->value = $this->model->getAttribute($this->attribute);
                }
            }
        }
    }

    /**
     * Renders the widget.
     */
    public function run() {
        UeditorAssets::register($this->view);
<<<<<<< HEAD
        echo $this->getScriptContent();
        $this->registerScripts();
=======
        $this->registerScripts();

        if ($this->renderTag) {
            echo $this->renderTag();
        }
>>>>>>> FETCH_HEAD
    }

    public function renderTag() {
        $id = $this->id;
        $content = $this->value;
        $name = $this->name;
        $style = $this->style ? " style=\"{$this->style}\"" : '';
        return <<<EOF
<script id="{$id}" name="{$name}"$style type="text/plain">{$content}</script>
EOF;
    }

    public function registerScripts() {
        $jsonOptions = Json::encode($this->jsOptions);
        $script = "UE.getEditor('{$this->id}', " . $jsonOptions . ")";
        if ($this->readyEvent) {
            $script .= ".ready(function(){{$this->readyEvent}})";
        }
        $script .= ';';
        $this->view->registerJs($script, View::POS_READY);
    }

}
