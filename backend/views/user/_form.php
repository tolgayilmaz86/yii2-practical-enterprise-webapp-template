<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\jui\DatePicker;

/**
 * @var yii\web\View $this
 * @var backend\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model,'birthDate')->widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <?= $form->field($model, 'gender_id')->widget(Select2::classname(),['data' => $model->genderList,]);?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password-repeat')->passwordInput() ?>

    <?= $form->field($model, 'status_id')->widget(Select2::classname(),['data' => $model->statusList,'options' => ['placeholder' => 'Select ...'],]);?>

    <?= $form->field($model, 'role_id')->widget(Select2::classname(),['data' => $model->roleList,'options' => ['placeholder' => 'Select ...'],]);?>

    <?= $form->field($model, 'user_type_id')->widget(Select2::classname(),['data' => $model->userTypeList,'options' => ['placeholder' => 'Select ...'],]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
