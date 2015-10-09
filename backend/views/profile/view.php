<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;
/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = $model->user->username . "'s Profile";
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        //this is not necessary but in here as example
        if (PermissionHelpers::userMustBeOwner('profile', $model->id) ||
            PermissionHelpers::requireMinimumRole('Admin',\Yii::$app->user->id)) {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
            'first_name:ntext',
            'last_name:ntext',
            'birth_date',
            'gender.gender_name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
