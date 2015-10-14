<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \yii\bootstrap\Collapse;
use \kartik\sidenav\SideNav;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php echo Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'rowOptions' => function ($model, $key, $index, $grid) {
                    return ['id' => $model['id'], 'onclick' => 'alert(this.id);'];
                },
                'icon' => 'search',
                'label' => 'Search',
                'content' => $this->render('_search', ['model' => $searchModel]) ,
//                'options' =>['class' => 'panel-info','icon' => 'search'],
                // open its content by default
//                'contentOptions' => ['class' => 'in']
            ],

        ]
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            ['attribute'=>'userIdLink', 'format'=>'raw','contentOptions' => ['style'=>'max-width:400px; overflow: auto; word-wrap: break-word;'],],
            ['attribute'=>'userLink', 'format'=>'raw','contentOptions' => ['style'=>'max-width:400px; overflow: auto; word-wrap: break-word;'],],
            ['attribute'=>'profileLink', 'format'=>'raw','contentOptions' => ['style'=>'max-width:400px; overflow: auto; word-wrap: break-word;'],],

            'email:email',
            'roleName',
            'userTypeName',
            'statusName',
            'created_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
