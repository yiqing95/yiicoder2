<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSsdb(){
        try{
            $ssdb = new \SimpleSSDB('127.0.0.1', 8888);
        }catch(Exception $e){
            die(__LINE__ . ' ' . $e->getMessage());
        }
        $ret = $ssdb->set('key', 'value');
        if($ret === false){
            // error!
        }
        echo $ssdb->get('key');


        var_dump($ssdb->set('test', time()));
        var_dump($ssdb->set('test', time()));
        echo $ssdb->get('test') . "\n";
        var_dump($ssdb->del('test'));
        var_dump($ssdb->del('test'));
        var_dump($ssdb->get('test'));
        echo "\n";

        var_dump($ssdb->hset('test', 'b', time()));
        var_dump($ssdb->hset('test', 'b', time()));
        echo $ssdb->hget('test', 'b') . "\n";
        var_dump($ssdb->hdel('test', 'b'));
        var_dump($ssdb->hdel('test', 'b'));
        var_dump($ssdb->hget('test', 'b'));
        echo "\n";

        var_dump($ssdb->zset('test', 'a', time()));
        var_dump($ssdb->zset('test', 'a', time()));
        echo $ssdb->zget('test', 'a') . "\n";
        var_dump($ssdb->zdel('test', 'a'));
        var_dump($ssdb->zdel('test', 'a'));
        var_dump($ssdb->zget('test', 'a'));
        echo "\n";

        $ssdb->close();
    }
}
