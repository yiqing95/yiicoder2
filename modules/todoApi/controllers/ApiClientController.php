<?php
/**
 * User: yiqing
 * Date: 2014/11/14
 * Time: 9:57
 */

namespace app\modules\todoApi\controllers;

use app\modules\todoApi\components\ApiCaller;
use yii\web\Controller;

class ApiClientController extends Controller{

    public function actionCall()
    {
        // return $this->action->getUniqueId() ;
        // $apiBaseUrl = 'http://localhost/github-yii2/my/yiicoder/web/index.php?r=todoApi/default/delete';
        $apiBaseUrl = 'http://localhost:88/github-yii2/my/yiicoder/web/index.php?r=todoApi/default/delete';
        $apiCaller = new ApiCaller('001','key1',$apiBaseUrl);
       $result =   $apiCaller->sendRequest(array(
           'r'=> 'hi',
           'r2'=> 'hi',
           'r3'=> 'hi',
        ));

        print_r($result) ;

    }

} 