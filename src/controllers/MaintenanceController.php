<?php

namespace hiqdev\maintenance\controllers;

use Yii;
use yii\base\ViewContextInterface;
use yii\web\Controller;

class MaintenanceController extends Controller implements ViewContextInterface
{
    public function init()
    {
        $this->layout = Yii::$app->maintenance->layoutPath;
        parent::init();
    }

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            return false;
        }

        if (Yii::$app->params['maintenance.time']) {
            $time = strtotime(Yii::$app->params['maintenance.time']);
            $minutes = ceil(($time - time()));
        } else {
            $minutes = 0;
        }

        return $this->render(Yii::$app->maintenance->viewPath, ['minutes' => $minutes]);
    }

    public function getViewPath()
    {
        return Yii::getAlias('@vendor/hiqdev/yii2-maintenance/src');
    }
}
