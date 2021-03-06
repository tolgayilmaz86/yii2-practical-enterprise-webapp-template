<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$show_this_nav = PermissionHelpers::requireMinimumRole('Admin');

$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(' Update', ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary glyphicon glyphicon-edit']);}?>

        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(' Phone', ['phone', 'id' => $model->id],
                ['class' => 'btn btn-primary glyphicon glyphicon-phone']);}?>

        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(' Addresses', ['../address/view', 'id' => $model->id],
                ['class' => 'btn btn-primary glyphicon glyphicon-road']);}?>

        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(' Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger glyphicon glyphicon-remove',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);}?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'profileLink', 'format'=>'raw'],
            ['attribute'=>'addressLink', 'format'=>'raw'],

            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'roleName',
            'statusName',
            'userTypeName',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>