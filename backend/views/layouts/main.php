<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\assets\FontAwesomeAsset;
use common\models\PermissionHelpers;
use kartik\nav\NavX;
use kartik\sidenav\SideNav;

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="navbar">
        <div class="col-sm-12">
            <?php
            if (!Yii::$app->user->isGuest){
                $is_admin = PermissionHelpers::requireMinimumRole('Admin');
                $menus['options'] = ['class'=>'nav nav-pills fa'];
            } else {
                NavBar::begin([
                    'brandLabel' => '64BitLabs',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                echo NavX::widget([
                    'options' => ['class' => 'nav nav-pills fa'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            }

            if (!Yii::$app->user->isGuest && $is_admin) {
                $menus['items'] = [
                    ['label' => 'Home', 'active'=>true, 'url'   => '/site/index'],
                    ['label' => 'Users', 'active'=>true, 'url'  => '/user/search'],
                    ['label' => 'Configurations', 'active'=>true,
                        'items' => [
                            ['label' => 'Add', 'url'            => '/configuration/create'],
                            ['label' => 'Update', 'url'         => '/configuration/update'],
                            ['label' => 'Roles', 'url'          => '/role/index'],
                            ['label' => 'Statuses', 'url'       => '/configuration/status'],
                            ['label' => 'Permissions', 'url'    => '/configuration/permissions'],
                            ['label' => 'User Types', 'url'     => '/user-type/index'],
                            '<li class="divider"></li>',
                            ['label' => 'Site', 'items' => [
                                ['label' => 'Usage', 'url'      => '/configuration/usage'],
                                ['label' => 'Security', 'url'   => '/configuration/security'],
                                ['label' => 'URLs', 'url'       => '/configuration/urls'],
                                '<li class="divider"></li>',
                                ['label' => 'Maintenance', 'url' => '/configuration/maintenance'],
                            ]],
                        ],
                        'url' => '/configuration/view'],
                    '<li class="divider"></li>',
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')','active'=>true,
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ];
                echo NavX::widget($menus);
            }
            ?>
        </div>
    </div>
    <div id="navBar" class="col-sm-2">
        <?php $this->beginContent('@backend/views/layouts/sidebar.php'); ?>

        <?php $this->endContent(); ?>
    </div>
    <div class="container">
        <div id="content" >
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 64BitLabs <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
