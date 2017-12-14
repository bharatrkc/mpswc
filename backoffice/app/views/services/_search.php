<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'services') ?>

    <?= $form->field($model, 'department') ?>

    <?= $form->field($model, 'when_approval_required') ?>

    <?= $form->field($model, 'minimum_eligibility') ?>

    <?php // echo $form->field($model, 'act_rule') ?>

    <?php // echo $form->field($model, 'validity_of_approval') ?>

    <?php // echo $form->field($model, 'procedure_for_applying') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'time_limit') ?>

    <?php // echo $form->field($model, 'authority_responsible') ?>

    <?php // echo $form->field($model, 'notified_under_public') ?>

    <?php // echo $form->field($model, 'any_other_special_condition') ?>

    <?php // echo $form->field($model, 'type_of_industry') ?>

    <?php // echo $form->field($model, 'industry_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
