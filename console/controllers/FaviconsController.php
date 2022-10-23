<?php


namespace console\controllers;


use ShiGuangXiaoTou\plugins\Cropping;
use yii\console\Controller;


/**
 * 裁剪 favicons
 * @package console\controllers
 */
class FaviconsController extends Controller
{


    public function actionIndex(){
        $img= dirname( __DIR__,2)."/assets/my/img/author.png";
        $arr =[
            ["sizes" => '16x16', 'href' => '/assets/img/favicons/favicons_16.png'],
            [ "sizes" => '32x32', 'href' => '/assets/img/favicons/favicons/favicons_32.png'],
            [ "sizes" => '76x76', 'href' => '/assets/img/favicons/favicons_76.png'],
            [ "sizes" => '120x120', 'href' => '/assets/img/favicons/favicons_120.png'],
            [ "sizes" => '152x152', 'href' => '/assets/img/favicons/favicons_152.png'],
            [ "sizes" => '180x180', 'href' => '/assets/img/favicons/favicons_180.png'],
            [ "sizes" => '192x192', 'href' => '/assets/img/favicons/favicons_192.png'],
        ];
        $savePath= \Yii::getAlias("@appAssets/favicons");
        foreach ($arr as $item){
            $size= explode("x",$item['sizes'])[0];
            Cropping::resampled( $img,$size,$size,$savePath."/favicons_".$size.".png");

        }

    }
}