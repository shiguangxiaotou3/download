<?php


namespace ShiGuangXiaoTou\controllers;

use Yii;
use yii\web\Controller;

class DocController extends Controller
{
    public $layout ="webslides";

    /**
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionApi(){
        return $this->render('api');
    }


    /**
     * 通用用展示文档
     * @return string
     */
    public function actionMd($id){
        $this->layout ="main";
        $pages = Yii::$app->params['pages'];
        foreach ($pages as $page){
            if($page["id"]== $id){
                $pageData=$page;
                break;
            }
        }

        return $this->render("md",['pageData'=>$pageData]);
    }

    public function actionTest(){
        $require = Yii::$app->request;
        logObject($require->headers);
        logObject($require->get());

    }
}