<?php


namespace common\widgets;

use Yii;
use yii\web\View;
use yii\base\Widget;
use ShiGuangXiaoTou\assets\FaviconsAsset;

/**
 * Class Seo
 *
 * @property-read View $view
 * @package common\widgets
 */
class Seo extends Widget
{
    /**
     * @var $_view View
     */
    private $_view;
    /**
     * @var array
     */
    public $seo = [];

    /**
     * 初始化
     */
    public function init()
    {
        parent::init();
        if (empty($this->seo)) {
            $params = Yii::$app->params;
            if (isset($params['seo']) and !empty($params["seo"])) {
                $this->seo = $params['seo'];
            }

        }
    }

    /**
     * @return yii\base\View|View
     */
    public function getView()
    {
        if (isset($this->_view)) {
            return $this->_view;
        }
        return Yii::$app->view;
    }

    /**
     * @return string|void
     */
    public function run()
    {
        $faviconsPath = Yii::$app->assetManager->getPublishedUrl('@favicons');
        foreach ($this->seo as $key => $items) {
            foreach ($items as $item) {
                if ($key == "favicons") {
                    FaviconsAsset::register( $this->view);
                    $item['href'] = $faviconsPath . "/" . $item["href"];
                }
                $this->registerTag($item);
            }
        }
    }

    /**
     * @param  $options
     */
    public function registerTag($options)
    {
        $tag = $options['tag'];
        unset($options['tag']);
        if ($tag == "link") {
            $this->view->registerLinkTag($options);
        }
        if ($tag == "meta") {
            $this->view->registerMetaTag($options);
        }

    }
}