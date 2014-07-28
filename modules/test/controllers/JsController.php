<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-6-17
 * Time: 下午9:07
 */

namespace app\modules\test\controllers;

use Yii;
use yii\web\Controller;

class JsController extends Controller{

    public function actionLocalStorage(){
        return $this->render('localStorage');
    }
} 