<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MainMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Main Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
