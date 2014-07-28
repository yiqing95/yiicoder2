<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-7-29
 * Time: 上午12:05
 */

namespace year\user\helpers;


class UserHelper {

    /**
     * @return string
     */
    public static function genSalt()
    {
        return md5(time());
    }
} 