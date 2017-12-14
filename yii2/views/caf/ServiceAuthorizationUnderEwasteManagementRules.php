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
			<div class="caption"><i class="fa fa-list"></i>Authorization Under E -Waste (Management) Rules, 2016</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">   
 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'date_of_commissioning')->textInput(['maxlength' => true])->label('Date of Commissioning'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'consents_validity')->textInput(['maxlength' => true])->label('Consents Validity'); ?>
			</div> 
		</div> 
		<div class="row">  
			<div class="col-lg-6">  
					<?= $form->field($model, 'validity_of_current_authorisation')->textInput(['maxlength' => true])->label('Validity of current authorisation if any e-waste (Management & Handling) Rules, 2011; Valid up to'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'dismantling_or_recycling_process')->textInput(['maxlength' => true])->label('Dismantling or Recycling Process'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'installed_capacity_in_mt_year')->textInput(['maxlength' => true])->label("Installed capacity in MT/year Products Installed capacity(MTA)"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'ewaste_processed_during_last_three_years')->textInput(['maxlength' => true])->label('E-waste processed during last three years Year ,Product, Quantity'); ?>
			</div> 
		</div>

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'waste_management')->textInput(['maxlength' => true])->label("Waste Management"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'name_of_treatment_storage')->textInput(['maxlength' => true])->label('Name of Treatment Storage and Disposal Facility utilized'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'details_of_ewaste')->textInput(['maxlength' => true])->label("Details of e-waste proposed to be procured from re-processing"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'occupational_safety_and_health_aspects')->textInput(['maxlength' => true])->label('Occupational safety and health aspects'); ?>
			</div> 
		<div>

		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_facilities_for_dismantling')->textInput(['maxlength' => true])->label('Details of Facilities for dismantling both manual as well as mechanised: Occupational safety and health aspects'); ?>
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