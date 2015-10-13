<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'assetManager' => [
            'bundles' => [
                // use bootstrap css from CDN
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,   // do not use file from our server
                    'css' => [
                        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css']
                ],
                // use fontawesome css from CDN
                'backend\assets\FontAwesomeAsset' => [
                    'sourcePath' => null,   // do not use file from our server
                    'css' => [
                        'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css']
                ],
                // use bootstrap js from CDN
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,   // do not use file from our server
                    'js' => [
                        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js']
                ],
                // use jquery from CDN
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                    'js' => [
                        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
                    ]
                ],
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mycomponent' => [
            'class' => 'components\MyComponent',
        ],
        'faqwidget' => [
            'class' => 'components\FaqWidget',
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
