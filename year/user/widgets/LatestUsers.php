<?php
/**
 * User: yiqing
 * Date: 14-7-31
 * Time: 下午4:28
 */

namespace year\user\widgets;

//\Yii::$container->set('\year\base\Widget',['cacheTime'=>1000]);

class LatestUsers extends \year\base\Widget{

    public function run()
    {
        // echo __FILE__ ;
        // echo $this-
       return   $this->render('latestUsers');
    }
} 