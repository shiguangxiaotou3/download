<?php

namespace ShiGuangXiaoTou\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use Google\Cloud\Translate\V2\TranslateClient;


/**
 * Class TranslateController
 * @package ShiGuangXiaoTou\controllers
 */
class TranslateController extends ApiController {

    /**
     * @return string
     */
    public function actionIndex(){
        return $this->render("index");
    }

    /***
     * ISO 639-1 语言代码列表
     */
    public function actionLanguages(){
        $cache = Yii::$app->cache;
        if(!$cache->get("iso")){
            $languages = $this->translate->languages();
            $iso=[];
            foreach ($languages as $language) {
                $iso[]= $language;
            }
            $cache->set("iso",$iso);
        }
        return $cache->get("iso");
    }

    /**
     * 获取支持的语言
     */
    public function actionLanguagesInfo(){
        $cache = Yii::$app->cache;
        if(!$cache->get("languageInfo")){
            $translate = new TranslateClient(["key"=>$this->key]);
            $languages = $this->translate->localizedLanguages();
            $results =[];
            foreach ($languages as $language) {
                $results []= $language;
            }
            $cache->set("languageInfo",$results );
        }
        return $cache->get("languageInfo");
    }

    /**
     * 检测语言
     */
    public function actionDetectLanguage(){
        return $this->translate->detectLanguage(
            Yii::$app->request->get("str","")
        );
    }

    /**
     * 批量检测语言
     */
    public function actionDetectLanguages(){
        return $this->translate->detectLanguageBatch(
            Yii::$app->request->get("str","")
        );

    }

    /**
     * translate
     */
    public function actionTranslate(){
        /** @var  $require Request */
        $require = Yii::$app->request;
        $source=$require->get("source","");
        $target=$require->get("target","zh-CN");
        $format=$require->get("format","text");
        $model=$require->get("model","text");
        $str = $require->get("str");
        if(isset($str) and !empty($str)){
            return $this->translate->translate($str,[
                "source"=>$source,
                "target"=> $target,
                "format"=>$format,
                "model"=>$model
            ]);
        }

    }
}