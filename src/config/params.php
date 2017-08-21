<?php
/**
 * Module for switching Yii2 project into maintenance mode.
 *
 * @link      https://github.com/hiqdev/yii2-maintenance
 * @package   yii2-maintenance
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

return [
    'maintenance.enable'    => !empty($_ENV['MAINTENANCE_ENABLE']),
    'maintenance.title'     => null,
    'maintenance.subtitle'  => null,
    'maintenance.time'      => null,
];
