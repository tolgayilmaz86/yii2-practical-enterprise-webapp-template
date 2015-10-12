<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatusMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'controller_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_message_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_message_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textArea(['maxlength' => 2025, 'rows' =>12]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
