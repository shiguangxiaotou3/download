<?php


namespace ShiGuangXiaoTou\controllers;

use ShiGuangXiaoTou\models\FileInfo;
use Yii;
use yii\web\Controller;

/**
 * Class IndexController
 * @package ShiGuangXiaoTou\controllers
 */
class IndexController extends Controller
{


    public $layout ="webslides";

    /**
     * @return string
     */
    public function actionIndex(){
        return  $this->render("index");
    }
    /**
     * @return string
     */
    public function actionError(){
        return  $this->render("error");
    }

    public function actionIcon(){
        return  $this->render("icon");
    }
}