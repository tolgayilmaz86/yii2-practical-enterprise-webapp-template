<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 10/10/15
 * Time: 12:39
 */

use kartik\sidenav\SideNav;
?>
<div class="nav nav-pills nav-stacked">
	<div class="span-6">
        <?php
echo SideNav::widget([
    'type' => SideNav::TYPE_PRIMARY,
    'heading' => 'Menu',
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
?>
        </div>
    </div>
