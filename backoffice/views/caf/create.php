<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caf */

$this->title = 'Create Caf';
$this->params['breadcrumbs'][] = ['label' => 'Cafs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
