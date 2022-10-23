<?php


namespace common\widgets;



use Yii;
use \yii\web\View;
use yii\base\Widget;
use ShiGuangXiaoTou\assets\HighlightAsset;

/**
 * 在页面中展示代码
 * @package common\widgets
 */
class Code extends Widget
{

    /**
     * @var  $theme
     */
    public $theme;
    /**
     * @var $language string
     */
    public $language;
    /**
     * @var $title string
     */
    public $title;
    /**
     * @var $code string
     */
    public $code;

    /**
     * @throws yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        /** @var  $view View */
        $view = Yii::$app->view;
        $path = Yii::$app->assetManager->getPublishedUrl("@appAssets/highlight");
        if ($this->theme == null) {
            $this->theme = "styles/monokai_sublime.css";
        }
        if ($this->title == null) {
            $this->title = "hello word";
        }
        if ($this->language == null) {
            $this->language = "text";
        }

        $view->registerCssFile($path . "/styles/monokai_sublime.css");
        HighlightAsset::register($view);
        $view->registerJs("hljs.initHighlightingOnLoad();", View::POS_HEAD);
    }

    /**
     * @return string
     */
    public function run()
    {
        if (!empty($this->code)) {
            return <<<HTML
    <pre><code class="language-{$this->language} " title="{$this->title}" >{$this->code}</code></pre>
HTML;
        }
        return false;
    }


}