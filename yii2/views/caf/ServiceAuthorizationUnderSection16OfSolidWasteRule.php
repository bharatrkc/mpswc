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

use yii\web\UploadedFile;

$this->title = 'Electricity Connection (HT)'; 
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


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
			<div class="caption"><i class="fa fa-list"></i>Authorization under Section 16 of Solid waste Management Rules 2016</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">   
 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'authorisation_required_for_setting_up_operation')->textInput(['maxlength' => true])->label('Authorisation required for setting up and operation of the facility'); ?>
			</div>
		</div> 

		<h3>Processing/recycling/treatment of solid waste</h3>
		<div class="row">  
			<div class="col-lg-6">
					<?= $form->field($model, 'total_quantity_of_waste')->textInput(['maxlength' => true])->label("Total Quantity of waste to be processed per day"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'quantity_of_waste_to_be_recycled')->textInput(['maxlength' => true])->label('Quantity of waste to be recycled'); ?>
			</div> 
		</div> 
		<div class="row">  
			<div class="col-lg-6">  
					<?= $form->field($model, 'quantity_of_waste_to_be_treated')->textInput(['maxlength' => true])->label('Quantity of waste to be treated'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'quantity_of_waste_to_be_disposed_into_landfill')->textInput(['maxlength' => true])->label('Quantity of waste to be disposed into landfill'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'utilisation_programme_for_waste_processed')->textInput(['maxlength' => true])->label("Utilisation programme for waste processed (Product utilisation)"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'methodology_for_disposal')->textInput(['maxlength' => true])->label('Methodology for disposal (attach details)'); ?>
			</div> 
		</div> 

		<h3>Quantity of leachate Treatment technology for leachate</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'measures_taken_prevention_control_environmental')->textInput(['maxlength' => true])->label("Measures to be taken for prevention and control of environmental pollution"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'measures_taken_for_safety_of_workers')->textInput(['maxlength' => true])->label('Measures to be taken for safety of workers working in the plant'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'details_on_solid_waste_processing')->textInput(['maxlength' => true])->label("Details on solid waste processing/recycling/treatment/disposal facility (to be attached)"); ?>
			</div>
		</div> 

		<h3>Disposal of solid waste</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_of_sites_identified')->textInput(['maxlength' => true])->label('Number of sites identified'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'quantity_waste_to_be_disposed_per_day')->textInput(['maxlength' => true])->label('Quantity of waste to be disposed per day'); ?>
			</div> 
		<div>

		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_methodology_followed')->textInput(['maxlength' => true])->label('Details of methodology or criteria followed for site selection (attach)'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_existing_site_under_operation')->textInput(['maxlength' => true])->label('Details of existing site under operation'); ?>
			</div> 
		</div>

		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'methodology_and_operational_details')->textInput(['maxlength' => true])->label('Methodology and operational details of landfilling'); ?>
			</div>   
			<div class="col-lg-6">  
					<?= $form->field($model, 'measures_to_check_environmental_pollution')->textInput(['maxlength' => true])->label('Measures taken to check environmental pollution'); ?>
			</div> 
		</div>

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'other_information')->textInput(['maxlength' => true])->label("EPFO Registration No."); ?>
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