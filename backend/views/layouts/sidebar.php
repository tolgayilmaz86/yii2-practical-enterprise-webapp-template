<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 10/10/15
 * Time: 12:39
 */
use kartik\sidenav\SideNav;
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'heading' => 'Operations',
        'items' => [
            [
                'url' => '#',
                'label' => 'Search',
                'icon' => 'search'
            ],
            [
                'label' => 'Edit',
                'icon' => 'edit',
                'items' => [
                    ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                    ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                ],
            ],
        ],
    ]);

