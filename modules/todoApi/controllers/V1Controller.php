<?php
/**
 * User: yiqing
 * Date: 2014/11/14
 * Time: 11:26
 */

namespace app\modules\todoApi\controllers;


use yii\web\Controller;
use yii\web\Response;

class V1Controller  extends Controller{

    public $enableCsrfValidation = false;

    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON ;

        return parent::beforeAction($action);
    }

    public function actionCall()
    {

        return array(
            'name'=>'yiqing',
        );
    }

} 