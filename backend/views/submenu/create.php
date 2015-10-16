<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Submenu */

$this->title = 'Create Submenu';
$this->params['breadcrumbs'][] = ['label' => 'Submenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
