<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'services',
            'department',
            'when_approval_required:ntext',
            'minimum_eligibility:ntext',
            'act_rule:ntext',
            'validity_of_approval:ntext',
            'procedure_for_applying:ntext',
            'website',
            'time_limit:ntext',
            'authority_responsible:ntext',
            'notified_under_public',
            'any_other_special_condition',
            'type_of_industry:ntext',
            'industry_status',
        ],
    ]) ?>

</div>
