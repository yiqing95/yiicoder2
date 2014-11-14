<?php

namespace app\modules\todoApi\controllers;

use yii\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        //create a new todo item
        return $this->id.'|'.$this->getUniqueId();
    }

    public function actionRead()
    {
        //read all the todo items
        return $this->id.'|'.$this->getUniqueId();
    }

    public function actionUpdate()
    {
        //update a todo item
        return $this->id.'|'.$this->getUniqueId();
    }

    public function actionDelete()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON ;

        //====================================================================================\\
       //Define our id-key pairs
        $applications = array(
            '001' => 'key1', //randomly generated app key
            '002' => 'key2',
        );
        //*UPDATED*
        //get the encrypted request
        $enc_request = $_REQUEST['enc_request'];
        //get the provided app id
        $app_id = $_REQUEST['app_id'];

        //check first if the app id exists in the list of applications
        if( !isset($applications[$app_id]) ) {
            throw new \Exception('Application does not exist!');
        }

        //decrypt the request
        $params = json_decode(trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $applications[$app_id], base64_decode($enc_request), MCRYPT_MODE_ECB)));

        /*
        //check if the request is valid by checking if it's an array and looking for the controller and action
        if( $params == false || isset($params->controller) == false || isset($params->action) == false ) {
            throw new Exception('Request is not valid');
        }
        */

        //cast it into an array
        $params = (array) $params;

        //====================================================================================//

        $enc_request = $_POST['enc_request'];


        return
            [
              'success'=> true ,
                'data'=> [
                  'test'  => $this->id.'|'.$this->getUniqueId().'|'.$this->action->getUniqueId() ,
                  'data'  => $_POST ,
                    'data2' =>$params ,
                ]
            ];


        //delete a todo item
    }
}
