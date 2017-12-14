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
			<div class="caption"><i class="fa fa-list"></i>Building Plan Approval by AKVN</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body"> 
		
		<h3>Engineer Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'engineer')->textInput(['maxlength' => true])->label('Engineer / architect'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'engineer_license_no')->textInput(['maxlength' => true])->label("Engineer / architect's license no"); ?>
			</div>
		</div>  
		
		<h3>Land Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'whether_land_is_diverted')->dropdownList([
							'1' => 'Yes', 
							'0' => 'No',
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Whether land is diverted'); ?> 
 
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'purpose_of_construction')->textInput(['maxlength' => true])->label("Purpose of construction"); ?>
			</div>
		</div>  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'approval_from_town_and_country_planning_department')->dropdownList([
							'1' => 'Yes', 
							'0' => 'No',
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Approval from Town and Country Planning Department (If Located outside Notified Industrial Area)'); ?>
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
		$("input").attr("disabled", true);
		$("select").attr("disabled", true);
		$("textarea").attr("disabled", true);
		$("#investorprojects-other_sector").prop("disabled", true);
		$(".form-group .btn").parent().html("");
	});
	', View::POS_READY, 'my-button-handler2');
}
?>