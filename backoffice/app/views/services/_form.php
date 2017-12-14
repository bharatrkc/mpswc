<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'services')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'when_approval_required')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'minimum_eligibility')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_rule')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'validity_of_approval')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'procedure_for_applying')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_limit')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'authority_responsible')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'notified_under_public')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'any_other_special_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_of_industry')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'industry_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
