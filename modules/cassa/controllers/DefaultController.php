<?php

namespace app\modules\cassa\controllers;

use yii\web\Controller;

use phpcassa\Connection\ConnectionPool;
use phpcassa\ColumnFamily;

class DefaultController extends Controller
{
    public function actionIndex()
    {

        $pool = new ConnectionPool('MyKeySpace', array('localhost'));

        $users = new ColumnFamily($pool, 'User');

        $users->insert('key', array('column1' => 'value1', 'column2' => 'value2'));

        $cnt = $users->get_count('key');

        $rslt = [
          'user:key'=>$users->get('key'),
            'count:key'=>$cnt,
        ];
        return print_r($rslt,true);

       // return $this->render('index');
    }

    /**
     * 返回单个用户的信息
     *
     * @param ColumnFamily $users
     * @param $key
     * @return array
     */
    protected function userInfo(ColumnFamily $users,$key){
        $cnt = $users->get_count($key);

        $rslt = [
            'user:key'=>$users->get($key),
            'count:key'=>$cnt,
        ];
        return $rslt ;
    }

    /**
     * 键移除测试
     *
     * @return array
     */
    public function actionDelTest(){

    // Start a connection pool, create our ColumnFamily instance
        $pool = new ConnectionPool('MyKeySpace', array('127.0.0.1'));
        $users = new ColumnFamily($pool, 'User');
        $rowKey = 'key:'.__METHOD__;
        $users->insert($rowKey,[
           'col1'=>1,
            'col2'=>2,
            'col3'=>3,
        ]);

        $resp = [
            'beforeDel'=>$users->get($rowKey),
        ];

        $users->remove($rowKey);

        $resp['afterDel'] = $users->get_count($rowKey);
        //  return $this->userInfo($users,$rowKey);
        return $resp ;
    }
}
