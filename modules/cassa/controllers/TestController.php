<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-6-3
 * Time: 下午10:43
 */

namespace app\modules\cassa\controllers;

use Yii;
use yii\web\Controller;

use Symfony\Component\Yaml\Yaml;

class TestController extends Controller
{

    /**
     * 解析数据模式定义 用程序生成对应的CF
     */
    public function actionYaml()
    {
        $schemaPath = Yii::getAlias('@mod_cassa/data') . DIRECTORY_SEPARATOR . 'cassandra.yaml';
        $data = Yaml::parse($schemaPath);
        print_r($data);


    }


    public function actionModelToArray()
    {
        $model = new \app\modules\cassa\models\Hotel();
        print_r($model->getAttributes());
    }


    /**
     * 测试decorator 模式！
     */
    public function actionTimeIt()
    {
        function timeIt($anyFunc)
        {
            $inner = function () use ($anyFunc) {
                $args = func_get_args();
                print_r('<p>before:' . microtime() . '</p><hr/>');
                $ret = call_user_func_array($anyFunc, $args);
                print_r('<p>after:' . microtime() . '</p><hr/>');
                return $ret;
            };
            return $inner;
        }

        $myFunc = function ($a, $b) {
            return $a + $b;
        };

        $myWrapperFunc = timeIt($myFunc);
        $sum = $myWrapperFunc(1, 2);
        print_r($sum);
    }

    public function actionSkipIf()
    {
        /**
         * 给修饰器传递参数
         * @param $condition
         * @param $msg
         * @return callable
         */
        function skipIf($condition, $msg)
        {
            $dec = function ($wrapped) use ($condition, $msg) {
                $inner = function () use ($condition, $msg, $wrapped) {
                    $args = func_get_args();
                    if (!$condition) {
                        return call_user_func_array($wrapped, $args);
                    } else {
                        print($msg);
                    }
                };
                return $inner;
            };
            return $dec;
        }

        $mySum = function ($a, $b) {
            return $a + $b;
        };
        $myFunc = skipIf(true, 'yes it is');
        $mySum2 = $myFunc($mySum);
        print_r($mySum2(1, 3));

        $myFunc2 = skipIf(false, 'never mind this msg');
        $mySum3 = $myFunc2($mySum);
        // $mySum3 = skipIf(false,'never print this msg')($mySum);
        print_r($mySum3(3, 4));
    }
} 