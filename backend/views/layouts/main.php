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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- CSS  -->
    <link href="/backend/web/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/backend/web/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="light-blue lighten-1" role="navigation">
        <div class="panel-primary panel-heading">
            <div class="container">
                <div class="nav-wrapper">
                    <a id="logo-container" href="/" class="brand-logo"><?php echo Html::encode(\Yii::$app->name); ?></a>
                    <?php
                    if (!Yii::$app->user->isGuest)
                    {
                        $is_admin = PermissionHelpers::requireMinimumRole('Admin');
                        $menus['options'] = ['class'=>'nav nav-pills fa right side-nav'];
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
                            ['label' => 'Home', 'active'=>true, 'url'   => '/site/'],
                            ['label' => 'Users', 'active'=>true, 'url'  => '/user/'],
                            ['label' => 'Logs', 'active'=>true, 'url'  => '/log/'],
                            ['label' => 'Reports', 'active'=>true, 'url'  => '/report/'],
                            ['label' => 'Status Messages', 'active'=>true,'url' => 'status-message/index'],
                            ['label' => 'Configurations', 'active'=>true,'url' => '/configuration/view',
                                'items' => [
                                    ['label' => 'List', 'url'           => '/configuration/'],
                                    ['label' => 'Add', 'url'            => '/configuration/create'],
                                    ['label' => 'Update', 'url'         => '/configuration/update'],
                                    ['label' => 'Roles', 'url'          => '/role/index'],
                                    ['label' => 'Statuses', 'url'       => '/status/'],
                                    ['label' => 'Permissions', 'url'    => '/configuration/permissions'],
                                    ['label' => 'User Types', 'url'     => '/user-type/index'],
                                    ['label' => 'FAQs', 'url'           => '/faq/index'],
                                    ['label' => 'FAQ Categories', 'url' => '/faq-category/index'],
                                    '<li class="divider"></li>',
                                    ['label' => 'Site', 'items' => [
                                        ['label' => 'Usage', 'url'      => '/configuration/usage'],
                                        ['label' => 'Security', 'url'   => '/configuration/security'],
                                        ['label' => 'URLs', 'url'       => '/configuration/urls'],
                                        ['label' => 'E-Mail', 'url'     => '/configuration/email'],
                                        ['label' => 'Maintenance', 'url'=> '/configuration/maintenance'],
                                    ]],
                                ],
                            ],
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
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="row" style="padding:1%;">
        <div class="col-xs-4 col-sm-3 com-md-2 col-lg-2">
            <div id="navBar">
                <?php $this->beginContent('@backend/views/layouts/sidebar.php'); ?>

                <?php $this->endContent(); ?>
            </div>
        </div>
        <div class="col-xs-4 col-sm-6 com-md-8 col-lg-8">
            <div class="panel panel-default">
                <div id="content" >
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-3 com-md-2 col-lg-2">

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
