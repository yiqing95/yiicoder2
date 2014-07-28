<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-7-28
 * Time: 下午11:27
 */

namespace year\user\models;


class SignupForm extends \yii\base\Model
{
    /**
     * @var string
     */
    public $username ;
    /**
     * @var string
     */
    public $email ;
    /**
     * @var string
     */
    public $password ;

    /**
     * @var string
     */
    public $verifyPassword;

    public function attributeLabels()
    {
        return [
            'username' => 'Your name',
            'email'=>'email',
            'password' => 'Your password',
        ];
    }

    public function rules()
    {
        return [
          [['email','username','password','verifyPassword'],'required'],
            ['verifyPassword','compare','compareAttribute' => 'password'],
            ['email','email',],
        ];
    }
}