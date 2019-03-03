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
    'maintenance.enable'    => isset($_ENV['MAINTENANCE_ENABLE']) ? $_ENV['MAINTENANCE_ENABLE'] : false,
    'maintenance.title'     => null,
    'maintenance.subtitle'  => null,
    'maintenance.time'      => isset($_ENV['MAINTENANCE_TIME']) ? $_ENV['MAINTENANCE_TIME'] : null,
    'maintenance.filter'    => null,
];
