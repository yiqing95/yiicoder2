<?php
/**
 * User: yiqing
 * Date: 14-7-31
 * Time: 下午4:17
 */

namespace year\base;

use Yii;
use yii\base\Widget as YiiBaseWidget;

/**
 * Class Widget
 * @package year\base
 */
class Widget extends YiiBaseWidget
{

    /**
     * 注意yii2 可以集中配置某个类的实例化属性
     *  \Yii::createObject()  这个归功于di了
     * 类似yii1的 widgetFactory的配置
     * 如：
     *     \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
     * @var int
     */
    public $cacheTime;

    /**
     * theme-able the widget
     *
     * @return string
     */
    public function getViewPath()
    {
        $viewPath = parent::getViewPath();
        if (Yii::$app->view->theme !== null) {
            $theme = Yii::$app->view->theme;
            if ($theme instanceof \year\base\Theme) {
                $themeName = $theme->name;
                $candidateDir = $viewPath . DIRECTORY_SEPARATOR . $themeName;
                if (is_dir($candidateDir)) {
                    $viewPath = $candidateDir;
                }
            }
            /*
             * borrow from yupe
             *
            $class = get_class($this);
            $obj = new ReflectionClass($class);
            $string = explode(Yii::app()->modulePath . DIRECTORY_SEPARATOR, $obj->getFileName(), 2);
            if (isset($string[1])) {
                $string = explode(DIRECTORY_SEPARATOR, $string[1], 2);
                $themeView = Yii::app()->themeManager->basePath . '/' .
                    Yii::app()->theme->name . '/' . 'views' . '/' .
                    $string[0] . '/' . 'widgets' . '/' . $class;
            }*/
        }
        return $viewPath;

    }
}