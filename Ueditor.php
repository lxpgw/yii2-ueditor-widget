<?php

namespace xj\ueditor;

use yii\base\Widget;
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
class Ueditor extends Widget
{
    /**
     * @var string the tag to use to render the button
     */
    public $tagName = 'button';
    /**
     * @var string the button label
     */
    public $label = 'Button';
    /**
     * @var boolean whether the label should be HTML-encoded.
     */
    public $encodeLabel = true;

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
        Html::addCssClass($this->options, 'btn');
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::tag($this->tagName, $this->encodeLabel ? Html::encode($this->label) : $this->label, $this->options);
        $this->registerPlugin('button');
    }
}
