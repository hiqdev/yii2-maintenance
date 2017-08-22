<?php

namespace hiqdev\maintenance;

use Closure;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Maintenance extends Component
{
    const STATUS_CODE_OK = 200;

    public $layoutPath = '@vendor/hiqdev/yii2-maintenance/src/views/layouts/main';

    public $viewPath = '@vendor/hiqdev/yii2-maintenance/src/views/maintenance/index';

    public $statusCode = 503;

    /**
     * Retry-After header
     * @var boolean|string
     */
    public $retryAfter = false;

    public $route = 'maintenance/index';

    /**
     * @var boolean|callable
     */
    public $filter;

    /**
     * @var bool
     */
    public $enable = false;

    /**
     * @var boolean
     */
    protected $disable;

    public function init()
    {
        if ($this->enable) {
            $this->filtering();
        }
    }

    protected function filtering()
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

        // Check rules
        if ($this->filter) {
            if ($this->filter instanceof Closure) {
                $this->disable = call_user_func($this->filter, $this);
            } else {
                $this->disable = boolval($this->filter);
            }
        }

        if (!$this->disable) {
            if ($this->route === 'maintenance/index') {
                $app->controllerMap['maintenance'] = \hiqdev\maintenance\controllers\MaintenanceController::class;
            }
            $app->catchAll = [$this->route];
        } else {
            $app->getResponse()->setStatusCode(self::STATUS_CODE_OK);
        }
    }
}
