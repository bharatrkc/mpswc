<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Communication */

$this->title = 'Update Communication: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Communications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="communication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'cafdata' => $cafdata,
    ]) ?>

</div>
