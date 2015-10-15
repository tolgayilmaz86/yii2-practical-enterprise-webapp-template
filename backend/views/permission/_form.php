<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\dropdown\DropdownX;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model common\models\Permission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->dropDownList($model->roleList, [ 'prompt' => 'Please Choose One' ]); ?>

    <?= $form->field($model, 'status_id')->dropDownList($model->statusList, [ 'prompt' => 'Please Choose One' ]); ?>

    <?= $form->field($model, 'main_menu_id')->dropDownList($model->mainMenuList, ['id' => 'mainmenu-id']); ?>

    <?= $form->field($model, 'submenu_id')->widget(DepDrop::classname(),[
        'pluginOptions'=>[
            'depends'=>['mainmenu-id'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/site/subcat'])
        ]
    ]);// dropDownList($model->getSubMenuList('user'), [ 'prompt' => 'Please Choose One' ]); ?>

    <div class="container">
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?= $form->field($model, 'view')->widget(CheckboxX::classname(),['autoLabel'=>true, 'pluginOptions'=>['threeState'=>false, 'theme'=>'krajee-flatblue']])->label(false); ?>
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?= $form->field($model, 'list')->widget(CheckboxX::classname(),['autoLabel'=>true, 'pluginOptions'=>['threeState'=>false, 'theme'=>'krajee-flatblue']])->label(false); ?>
            </div>
            <div class="form-group has-warning col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?= $form->field($model, 'update')->widget(CheckboxX::classname(), ['autoLabel'=>true, 'pluginOptions'=>['threeState'=>false, 'theme'=>'krajee-flatblue']])->label(false); ?>
            </div>
            <div class="form-group has-success col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?= $form->field($model, 'create')->widget(CheckboxX::classname(), ['autoLabel'=>true, 'pluginOptions'=>['threeState'=>false, 'theme'=>'krajee-flatblue']])->label(false); ?>
            </div>
            <div class="form-group has-error col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <?= $form->field($model, 'delete')->widget(CheckboxX::classname(), ['autoLabel'=>true, 'pluginOptions'=>['threeState'=>false, 'theme'=>'krajee-flatblue']])->label(false); ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
