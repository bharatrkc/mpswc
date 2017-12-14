<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Questiongroup */

$this->title = 'Create Questiongroup';
$this->params['breadcrumbs'][] = ['label' => 'Questiongroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questiongroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
