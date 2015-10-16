<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\FaqCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faq_category_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'faq_category_weight')->textInput() ?>

    <?= $form->field($model, 'faq_category_is_featured')->widget(Select2::classname(),['data' => $model->faqCategoryIsFeaturedList,'options' => ['placeholder' => 'Select ...'],]);?>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
