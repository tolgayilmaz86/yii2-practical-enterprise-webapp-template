<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [ 'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+\-\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<id:\d+>/<slug:[A-Za-z0-9 -_.]+>' => '<controller>/view',
            ],
        ],
    ],
//    'view' => [
//        'class' => 'yii\web\View',
//        'theme' => [
//            'class' => 'yii\base\Theme',
//            'pathMap' => ['@app/views' => 'themes/material'],
//            'baseUrl'   => 'themes/material'
//        ]
//    ]
];
