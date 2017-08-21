<?php

namespace hiqdev\maintenance;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\console\Application;

class Maintenance extends Component
{
    const STATUS_CODE_OK = 200;

    public $layoutPath = '@vendor/hiqdev/yii2-maintenance/src/views/layouts/main';

    public $viewPath = '@vendor/hiqdev/yii2-maintenance/src/views/maintenance/index';

    public $statusCode = 503;

    public $retryAfter = false;

    public $route = 'maintenance/index';

    public $applyCallback;

    public $enable = false;

    public function init()
    {
        if (Yii::$app instanceof Application) {
            Yii::$app->controllerMap['maintenance'] = 'hiqdev\maintenance\command\MaintenanceController';
        } else {
            if ($this->getIsEnabled()) {
                $this->filterRules();
            }
        }
    }

    protected function filterRules()
    {
        $app = Yii::$app;
        if ($this->statusCode) {
            if (is_integer($this->statusCode)) {
                if ($app->getRequest()->getIsAjax()) {
                    $app->getResponse()->setStatusCode(self::STATUS_CODE_OK);
                } else {
                    $app->getResponse()->setStatusCode($this->statusCode);
                    if ($this->retryAfter) {
                        $app->getResponse()->getHeaders()->set('Retry-After', $this->retryAfter);
                    }
                }
            } else {
                throw new InvalidConfigException('Parameter "statusCode" should be an integer.');
            }
        }
        $a = boolval($this->enable);
        if ($a) {
            if ($this->route === 'maintenance/index') {
                $app->controllerMap['maintenance'] = 'hiqdev\maintenance\controllers\MaintenanceController';
            }
            $app->catchAll = [$this->route];
        } else {
            $app->getResponse()->setStatusCode(self::STATUS_CODE_OK);
        }
    }

    protected function getIsEnabled()
    {
        return true;
    }
}
