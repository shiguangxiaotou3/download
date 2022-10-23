<?php


namespace ShiGuangXiaoTou\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class ApiController
 *
 * @property-read string  $translateKey
 * @package ShiGuangXiaoTou\controllers
 */
class ApiController extends  Controller{

    /**
     * @var $translateKey string
     */
    private $translateKey;

    /**
     * @param yii\base\Action $action
     * @return bool
     * @throws yii\web\BadRequestHttpException
     */
    public function beforeAction($action){
        if($action->id !=="index"){
            $require = Yii::$app->request;
            $headers=$require->headers;
            $this->translateKey=  Yii::$app->params["translateKey"];
//        logObject( [
//            //数据发送结构
//             $headers["Content-Type"],// "application/json"
//            // 告知服务器该客户代理可以理解何种形式的字符编码
//            $headers["Accept-Charset"],
//            // 确说明了（接收端）可以接受的内容编码形式
//            $headers["Accept-Encoding"],
//            // 用来提示用户期望获得的自然语言的
//            $headers['Accept-Language'],
//            ]);
            $response = Yii::$app->response;
            $response->format=Response::FORMAT_JSON;
            $response->on(Response::EVENT_BEFORE_SEND,function ($event) {
                $response = $event->sender;
                $response->data = [
                    'success' => $response->isSuccessful,
                    'code' => $response->getStatusCode(),
                    'message' => $response->statusText,
                    'data' => $response->data,
                ];
                $response->statusCode = 200;
            });
//            return parent::beforeAction($action);
        }
        return parent::beforeAction($action);
    }


    public function error(){

    }


    public function success(){

    }
}