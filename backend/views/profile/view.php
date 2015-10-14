<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;

/**
 * @var yii\web\View $this
 * @var backend\models\Profile $model
 */

$this->title = $model->user->username;
$show_this_nav = PermissionHelpers::requireMinimumRole('Admin');

$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h3>Profile:  <?= Html::encode($this->title) ?></h3>
    <p>
        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a('Update', ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']);}?>

        <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);}?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'userLink', 'format'=>'raw'],
            'first_name',
            'last_name',
            'birth_date',
            'gender.gender_name',
            'created_at',
            'updated_at',
        ],
    ])?>

</div>