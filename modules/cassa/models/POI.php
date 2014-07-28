<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-6-3
 * Time: 下午11:12
 */

namespace app\modules\cassa\models;


use yii\base\Model;

/**
 * //data transfer object for a Point of Interest
 *
 * Class POI
 * @package app\modules\cassa\models
 */
class POI extends Model{
    /**
     * @var string
     */
    public $name = '' ;
    /**
     * @var string
     */
    public $desc = '' ;
    /**
     * @var string
     */
    public $phone = '' ;

} 