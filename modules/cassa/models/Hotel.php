<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-6-3
 * Time: 下午11:04
 */

namespace app\modules\cassa\models;


use yii\base\Model;

/**
 * <<DTO>>: //data transfer object
 *
 * Class Hotel
 * @package app\modules\cassa\models
 */
class Hotel extends  Model{

    /**
     * @var string
     */
    public $id = '';
    /**
     * @var string
     */
    public $name = '';
    /**
     * @var string
     */
    public $phone = '';
    /**
     * @var string
     */
    public $address = '';
    /**
     * @var string
     */
    public $city = '';
    /**
     * @var string
     */
    public $state = '';
    /**
     * @var string
     */
    public $zip = '';
} 