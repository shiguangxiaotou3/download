<?php


namespace ShiGuangXiaoTou\controllers;


use yii\web\Controller;

class IndexController extends Controller
{

//    public $layout =false;

    public function actionIndex(){
        return $this->render("index");
    }
    public function actionError(){
        echo "asdas";

    }
}