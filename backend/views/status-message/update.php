<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatusMessage */

$this->title = 'Update Status Message: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-message-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
