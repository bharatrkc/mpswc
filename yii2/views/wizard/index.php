<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Wizard';
$this->params['breadcrumbs'][] = $this->title;
 
?> 
<ul>
<li><?php echo Html::a('Service Wizard', Yii::$app->request->baseUrl."wizard/service"); ?></li>
<li><?php echo Html::a('CAF Wizard', "wizard/prestablish"); ?></li>

</ul>
