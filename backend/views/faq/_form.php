<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faq_question')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'faq_answer')->textArea(['maxlength' => 2055, 'rows' =>10]) ?>

    <?= $form->field($model, 'faq_category_id')->dropDownList($model->faqCategoryList, [ 'prompt' => 'Please Choose One' ]);?>

    <?= $form->field($model, 'faq_is_featured')->dropDownList($model->faqIsFeaturedList, [ 'prompt' => 'Please Choose One' ]);?>

    <?= $form->field($model, 'faq_weight')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>