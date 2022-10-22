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


    /**
     * @return string
     */
    public function actionIndex(){
        $path = Yii::getAlias('@appAssets/files');
        $data=[];
         FileInfo::getFilesInfo($path, $data,$path,'./');
        return $this->render("index",['data'=>$data]);
    }


    public function list(){

    }

    public function actionError(){
        echo "asdas";
    }
}