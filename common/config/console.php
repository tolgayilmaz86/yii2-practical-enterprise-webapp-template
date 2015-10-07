<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 07/10/15
 * Time: 20:52
 */
return [
    'id' => 'yii-template-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
    ],
];