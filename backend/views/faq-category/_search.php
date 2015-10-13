<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FaqCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'faq_category_name') ?>

    <?= $form->field($model, 'faq_category_is_featured')->dropDownList($model->faqCategoryIsFeaturedList, ['prompt' => 'Please Choose One'])?>

    <?= $form->field($model, 'faq_category_weight') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
