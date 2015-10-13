<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configurations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Configuration', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'responsiveWrap' => false,
        'hover' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'conf_key',
            ['attribute' => 'conf_value',
                'class' => 'kartik\grid\DataColumn',
                'contentOptions' => ['style'=>'max-width:400px; overflow: auto; word-wrap: break-word;']
            ],
            'class_name',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
