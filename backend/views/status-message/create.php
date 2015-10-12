<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StatusMessage */

$this->title = 'Create Status Message';
$this->params['breadcrumbs'][] = ['label' => 'Status Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
