<?php

namespace xj\ueditor;

use xj\ueditor\UeditorAssets;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\View;

/**
 * Ueditor Widget
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
 */
class Ueditor extends InputWidget {

    /**
     * Editor Default Id
     * @var string 
     */
    public $id;

    /**
     * Editor Default Value
     * @var string 
     */
    public $value;

    /**
     * ueditor options 
     * 
     * @var array
     */
    public $jsOptions = [];

    /**
     * script tag style
     * @var string
     */
    public $style;

    /**
     * Initializes the widget.
     */
    public function init() {
        parent::init();
        if (empty($this->id)) {
            $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
        if (empty($this->value))
            if ($this->hasModel())
                if (property_exists($this->model, $this->attribute))
                    $this->value = $this->model[$this->attribute];
    }

    /**
     * Renders the widget.
     */
    public function run() {
        UeditorAssets::register($this->view);
        echo $this->getScriptContent();
        $this->registerScripts();
    }

    public function getScriptContent() {
        $id = $this->id;
        $content = $this->value;
        $style = $this->style ? " style=\"{$this->style}\"" : "";
        return <<<EOF
<script id="{$id}" name="{$id}" type="text/plain"{$style}>{$content}</script>
EOF;
    }

    public function registerScripts() {
        $jsonOptions = Json::encode($this->jsOptions);
        $varName = Inflector::classify('ue_' . $this->id);
        $script = "var {$varName} = UE.getEditor('{$this->id}', " . $jsonOptions . ");";
        echo Html::tag('div', '', ['id' => $this->id]);
        $this->view->registerJs($script, View::POS_END);
    }

}
