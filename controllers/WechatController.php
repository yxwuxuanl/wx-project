<?php
/**
 * Created by PhpStorm.
 * User: wuxua
 * Date: 2017/7/12
 * Time: 14:31
 */

namespace app\controllers;
use app\lib\Wechat;

use Yii;

class WechatController extends Wechat
{
    public function __construct()
    {
        $options = Yii::$app->params['wechat'];
        parent::__construct($options);
    }

    public function getCache($cachename)
    {
        return Yii::$app->cache->get($cachename);
    }

    public function setCache($cachename, $value, $expired)
    {
        return Yii::$app->cache->set($cachename, $value, $expired);
    }

    public function removeCache($cachename)
    {
        return Yii::$app->cache->delete($cachename);
    }
}