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
    'bootstrap' => [
        'maintenance' => 'maintenance',
    ],
    'components' => [
        'maintenance' => [
            'class' => \hiqdev\maintenance\Maintenance::class,
            'enable' => $params['maintenance.enable'],
        ],
        'i18n' => [
            'translations' => [
                'maintenance' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'sourceLanguage' => 'en-US',
                    'basePath' => dirname(__DIR__) . '/src/messages',
                ],
            ],
        ],
    ],
];
