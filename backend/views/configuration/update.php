<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Configuration */

$this->title = 'Update Configuration: ' . ' ' . $model->conf_key;
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->conf_key, 'url' => ['view', 'id' => $model->conf_key]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
