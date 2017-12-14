<?php
use yii\web\View;  
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
  
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar; 
use app\assets\AppAsset;   
use yii\helpers\ArrayHelper;  
use yii\jui\DatePicker;

use app\models\State;
use app\models\Country;
use app\models\District;
use app\models\City;
use app\models\Town;
use app\models\Tehsil;

$this->title = 'Consolidated Appication Form'; 
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin(); 

//$investor_project[0]
?>
<div role="main" class="main">
	<section class="">
			<div class="row">
				<div class="col-md-12">
					<?php /* Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) */ 
					echo $steps;
					?>
				</div>
			</div>
	</section>
 </div>


<?php

foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}

?>
<div class="container-fluid">

	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>NOC from Fire Department</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body"> 
		
		<h3>Applicant Details</h3>
		<div class="row"> 
			<div class="col-lg-12">  
					<?= $form->field($model, 'type_of_noc')->textInput(['maxlength' => true])->label('Type of NOC'); ?>
			</div> 
		</div> 
		
		<h3>Type of Occupancy</h3>
		<div class="row">  
			<div class="col-lg-12">
					<?= $form->field($model, 'occupancy_type')->textInput(['maxlength' => true])->label("Select Your Occupancy"); ?>
			</div>
		</div>  
	</div>
	</div>   
		<div class="form-group">
			<?= Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>
</div>
<?php
if($disabled) {
	$this->registerJs(

	'$(document).ready(function(){
		$(function () {
  			$("[data-toggle="tooltip"]").tooltip()
		})


		$("input").attr("disabled", true);
		$("select").attr("disabled", true);
		$("textarea").attr("disabled", true);
		$("#investorprojects-other_sector").prop("disabled", true);
		$(".form-group .btn").parent().html("");
	});
	', View::POS_READY, 'my-button-handler2');
}
?>