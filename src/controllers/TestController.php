<?php


namespace ShiGuangXiaoTou\controllers;

use ShiGuangXiaoTou\components\Controller;

class TestController extends Controller
{
    public $layout="";
    public function actionIndex(){
        return $this->render();
    }
}