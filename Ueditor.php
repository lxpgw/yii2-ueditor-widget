<?php

namespace xj\ueditor;

use xj\ueditor\UeditorAssets;
use yii\widgets\InputWidget;
use yii\helpers\Html;

/**
 * Ueditor Widget
 *
 * For example,
 *
 * ```php
 * echo Ueditor::widget([
 * ]);
 * ```
 */
class Ueditor extends InputWidget {

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init() {
        parent::init();
//        $this->clientOptions = false;
//        Html::addCssClass($this->options, 'btn');
        
//        if (empty($this->id)) {
//            $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
//        }
        
    }

    /**
     * Renders the widget.
     */
    public function run() {
//        echo Html::tag($this->tagName, $this->encodeLabel ? Html::encode($this->label) : $this->label, $this->options);
//        $this->registerPlugin('button');
//        UeditorAssets::register($this->view);

    }

}
