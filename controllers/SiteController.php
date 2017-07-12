<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

use app\lib\Wechat\Wechat;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $config = Yii::$app->params['wechat'];

        $wechat = new Wechat($config);

        $msg = $wechat->serve();

        $wechat->reply($msg);
    }
}