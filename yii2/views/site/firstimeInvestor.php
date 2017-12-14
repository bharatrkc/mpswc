<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->context->layout = 'fistimeInvestor';

$this->title = 'Welcome to MP Invest !'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<style>
.stats .col-lg-3 {
    width: 20%;
}

</style>
<?php
if(count(Yii::$app->session->getAllFlashes())) {
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
}

?>
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"><i style=" font-size:20px;" class="fa fa-list"></i><?= Html::encode($this->title) ?></div>
		<div class="tools"> </div>
	</div>

	<div class="portlet-body">
 
 
	<h3>To proceed further, please add a project: &nbsp;&nbsp;<br>&nbsp;<br>
	&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= Url::to(['project/add']) ?>" class="btn btn-primary">Existing Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="<?= Url::to(['project/add']) ?>" class="btn btn-primary">New Project</a></h3>
&nbsp;<br>&nbsp;<br>
	</div>
</div>
