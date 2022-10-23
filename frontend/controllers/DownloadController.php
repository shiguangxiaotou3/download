<?php


namespace ShiGuangXiaoTou\controllers;



use Yii;
use yii\web\Controller;
use ShiGuangXiaoTou\models\FileInfo;

/**
 * Class DownloadController
 * @package ShiGuangXiaoTou\controllers
 */
class DownloadController extends Controller
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
}