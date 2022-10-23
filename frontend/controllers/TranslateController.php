<?php

namespace ShiGuangXiaoTou\controllers;

use Yii;
use yii\web\Controller;
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
            $translate = new TranslateClient(["key"=>$this->key]);
            $languages = $translate->languages();
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
            $languages = $translate->localizedLanguages();
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

    }

    /**
     * 批量检测语言
     */
    public function actionDetectLanguages(){

    }

    /**
     * translate
     */
    public function actionTranslate(){

    }
}