<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FaqCategory */

$this->title = 'Create Faq Category';
$this->params['breadcrumbs'][] = ['label' => 'Faq Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-category-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
