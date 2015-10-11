<div class="sidebar">
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