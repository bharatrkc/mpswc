<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Communicationsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Communications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-communication create">
	<div class="col-lg-12">
		<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-list"></i>Communication</div>
						<div class="tools"> </div>
				</div>

			<div class="portlet-body">
				<div class="row">
					
<div class="communication-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo Html::a('Create Communication', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
	<?php Pjax::begin(); ?>
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
        	'communication_detail:ntext',
            'date_created',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end(); ?>
					
					</div>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
