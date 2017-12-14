<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Communication */

$this->title = 'Create Communication';
$this->params['breadcrumbs'][] = ['label' => 'Communications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="communication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'cafdata' => $cafdata,
		'cafdata1' => $cafdata1,
		'prosingle' => $prosingle,
		'pdata1' => $pdata1,
    ]) ?>

</div>
