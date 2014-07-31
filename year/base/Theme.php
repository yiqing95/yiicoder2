<?php
/**
 * User: yiqing
 * Date: 14-7-31
 * Time: 下午4:50
 */

namespace year\base;

use yii\base\Theme as YiiBaseTheme;

class Theme extends YiiBaseTheme{
    /**
     * give a name for this theme
     * widget will use it to determine the view location !
     * @var string
     */
    public $name = 'bootstrap';
} 