<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Services', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'services',
            'department',
            'when_approval_required:ntext',
            'minimum_eligibility:ntext',
            // 'act_rule:ntext',
            // 'validity_of_approval:ntext',
            // 'procedure_for_applying:ntext',
            // 'website',
            // 'time_limit:ntext',
            // 'authority_responsible:ntext',
            // 'notified_under_public',
            // 'any_other_special_condition',
            // 'type_of_industry:ntext',
            // 'industry_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
