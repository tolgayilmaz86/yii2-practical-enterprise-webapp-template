<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Permission */

$this->title = 'Assign Permission';
$this->params['breadcrumbs'][] = ['label' => 'Permissions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
