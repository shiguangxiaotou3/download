<?php


namespace ShiGuangXiaoTou\widgets;

use Yii;
use yii\base\Widget;

/**
 * 卡片生产器
 * @package ShiGuangXiaoTou\widgets
 */
class CardWidget extends Widget
{

    public $assets;
    /**
     * 资源包路由
     * @var $assetsPath
     */
    private $_assetsUrl="";
    /**
     * 页面标题
     * @var $title
     */
    public $title;
    /**
     * 页面说明
     * @var $description
     */
    public $description;
    public $items=[];

    /**
     * 初始化
     */
    public function init(){
        parent::init();
        if ($this->assets == null) {
            $this->_assetsUrl = Yii::$app->assetManager->getPublishedUrl("@appAssets/webslides");
        }else{
            $this->_assetsUrl = Yii::$app->assetManager->getPublishedUrl($this->assets);
        }

    }

    /**
     * @return string
     */
    public function run(){
       return <<<HTML
<section>
    <div class="wrap">
        <h2><strong>{$this->title}</strong></h2>
        <p>{$this->description}</p>
        <ul class="flexblock gallery">  
            {$this->renderItems()}
        </ul>
    </div>
</section>
HTML;

    }

    /**
     * @param $item
     * @return string
     */
    public  function renderItem($item){
        if(substr($item["img"],0,2)=="./"){
            $item["img"] = $this->_assetsUrl ."/".  str_replace("./","",$item["img"]);
        }

        return <<<HTML
<li>
    <a href="{$item['href']}" title="{$item['title']}">
        <figure>
            <img alt="{$item['title']}" src="{$item["img"]}">
            <figcaption>
                <h2>{$item['title']}</h2>
            </figcaption>
        </figure>
    </a>
</li>
HTML;


    }

    /**
     *
     * @return string
     */
    public function renderItems(){
        $i=1;
        $str='';
        foreach ($this->items as $item){
            if($i >8 ){
                return $str;
            }
            $str .= $this->renderItem($item);
        }
        return $str;

    }
}