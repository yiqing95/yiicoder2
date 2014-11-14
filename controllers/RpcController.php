<?php
/**
 * User: yiqing
 * Date: 2014/11/9
 * Time: 7:46
 */

namespace app\controllers;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;

class RpcController extends Controller {

    /**
     * 必须关闭这个验证不然调用会失败的！
     *
     * @var bool
     */
    public $enableCsrfValidation = false ;


    public function actionHproseServer()
    {
        require_once( Yii::getAlias('@app/libs/hprose-php'). '/php5/HproseHttpServer.php');

        $server = new \HproseHttpServer();
        // $server->addFunction('hello');
        $server->addMethod('call',$this);
        $server->start();

        Yii::$app->end();
        // return 'this is a test ';
    }
    public function call(){
        throw new Exception('hii',1000);
        return array(
            'method'=>__METHOD__ ,
            'params'=>func_get_args(),
        );
       //        return __METHOD__ ;
    }
    public function actionHproseClient()
    {
        require_once(Yii::getAlias('@app/libs/hprose-php')."/php5/HproseHttpClient.php");
        $rpcBaseUrl = Url::to(['hprose-server'],true);
       // return $rpcBaseUrl ;
        $client = new \HproseHttpClient($rpcBaseUrl);
       // return print_r($client->call('method',['p1'=>1,'p2']),true);
        try{
            $result = $client->call('method',['p1'=>1,'p2']) ;
            return print_r($result,true);
        }catch (\Exception $ex){
            return print_r($ex,true);
        }

    }
} 