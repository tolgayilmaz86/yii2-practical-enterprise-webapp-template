<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-index">
    <?php echo Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'label' => 'Search',
                'content' => $this->render('_search', ['model' => $searchModel]) ,
                // open its content by default
                //'contentOptions' => ['class' => 'in']
            ],

        ]
    ]); ?>

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
