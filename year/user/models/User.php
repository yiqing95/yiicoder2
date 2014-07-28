<?php

namespace year\user\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $icon_url
 * @property string $password
 * @property string $salt
 * @property integer $status
 * @property string $last_login_ip
 * @property integer $last_active_at
 * @property integer $created_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'salt', 'created_at'], 'required'],
            [['status', 'last_active_at', 'created_at'], 'integer'],
            [['username', 'email', 'icon_url', 'password', 'salt'], 'string', 'max' => 255],
            [['last_login_ip'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'icon_url' => Yii::t('app', 'Icon Url'),
            'password' => Yii::t('app', 'Password'),
            'salt' => Yii::t('app', 'Salt'),
            'status' => Yii::t('app', 'Status'),
            'last_login_ip' => Yii::t('app', 'Last Login Ip'),
            'last_active_at' => Yii::t('app', 'Last Active At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
