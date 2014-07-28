<?php

namespace app\modules\cassa;

use Yii ;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\cassa\controllers';

    public function init()
    {
       Yii::setAlias('@mod_cassa',__DIR__);

        parent::init();


        // custom initialization code goes here
    }
}
