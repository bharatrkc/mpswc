<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestiongroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questiongroups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questiongroup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Questiongroup', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'questionnaire_id',
            'heading',
            'description',
            'disp_order',
            // 'category',
            // 'status',
            // 'remarks_flag',
            // 'created_by',
            // 'created_date',
            // 'updated_by',
            // 'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
