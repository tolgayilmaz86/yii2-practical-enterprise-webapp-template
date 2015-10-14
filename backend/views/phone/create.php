<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Phone */

$this->title = 'Create Phone';
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
