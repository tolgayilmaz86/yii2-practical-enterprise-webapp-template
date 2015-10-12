<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 10/10/15
 * Time: 12:39
 */
/* @var $menuItems array */
/* @var $this yii\web\View */
use kartik\sidenav\SideNav;
//    $menuItems = [
//        [
//            'url' => '#',
//            'label' => 'Search',
//            'icon' => 'search'
//        ],
//        [
//            'label' => 'Edit',
//            'icon' => 'edit',
//            'items' => [
//                ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
//                ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
//            ],
//        ],
//    ];
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'heading' => 'Operations',
        'items' => $this->params['menuItems'],
    ]);

