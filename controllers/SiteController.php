<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        var_dump(Yii::$app->weahct->valid());
    }
}