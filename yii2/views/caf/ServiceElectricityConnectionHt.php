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

$this->title = 'Electricity Connection (HT)'; 
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
			<div class="caption"><i class="fa fa-list"></i>Electricity Connection (HT)</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'type_of_connection_ht_lt')->dropdownList([
							'HT' => 'HT', 
							], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label('Type of connection'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'application_type')->textInput(['maxlength' => true])->label("Application Type"); ?>
			</div>
		</div>  
		
		<h3>Connection Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'type_of_electric_connection')->dropdownList([
							'Permanent' => 'Permanent', 
							'Temporary' => 'Temporary',], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label('Type of connection'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'category_of_electric_connection')->dropdownList([
							'HV-1 Railway Traction' => 'HV-1 Railway Traction', 
							'HV-2 Coal Mines' => 'HV-2 Coal Mines', 
							'HV-3.1 Industrial' => 'HV-3.1 Industrial', 
							'HV-3.2 Non-Industrial' => 'HV-3.2 Non-Industrial', 
							'HV-3.3 Shopping Malls' => 'HV-3.3 Shopping Malls', 
							'HV-3.4 Power Intensive Industries' => 'HV-3.4 Power Intensive Industries', 
							'HV-4 Seasonal' => 'HV-4 Seasonal', 
							'HV-5.1 Public Water Works' => 'HV-5.1 Public Water Works', 
							'HV-5.2 Other Than Agriculture' => 'HV-5.2 Other Than Agriculture',
							'HV-6.1 Townships' => 'HV-6.1 Townships',
							'HV-6.2 Cooprative Society' => 'HV-6.2 Cooprative Society',
							'HV-7 Start Up Power' => 'HV-7 Start Up Power',
							], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label("Category of Electric Connection"); ?>
			</div>
		</div>    
		
		<h3>Connection Address</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'khasra_no')->textInput(['maxlength' => true])->label('Khasra / Plot No'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'area')->textInput(['maxlength' => true])->label("Area (Sq Feet)"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'colony')->textInput(['maxlength' => true])->label('Colony / Area Name'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'pincode')->textInput(['maxlength' => true])->label("Pincode"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">   
					<?php 
						$items = ArrayHelper::map(District::find()->where(['state_id'=>1])->all(), 'district_id', 'name');
						echo $form->field($model, 'district')->dropDownList($items, 
						['prompt' => 'Select District',]);
					?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'block')->textInput(['maxlength' => true])->label("Block"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'panchayat')->textInput(['maxlength' => true])->label('Panchayat / Zone'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'ward')->textInput(['maxlength' => true])->label("Ward / Village"); ?>
			</div>
		</div>   
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'type_of_connection_govt_private')->dropdownList([
							'Government' => 'Government', 
							'Private' => 'Private',], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label('Type of connection'); ?> 
			</div> 
			<div class="col-lg-6"> 
					<?= $form->field($model, 'end_date_of_registration')->widget(DatePicker::classname(), ['class' => 'form-control'])->label('End date of registration (Validity)'); ?>
			</div>
		</div>   
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'bank_name')->textInput(['maxlength' => true])->label('Bank Name'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'ifsc_code')->textInput(['maxlength' => true])->label("IFSC Code"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'account_no')->textInput(['maxlength' => true])->label('Account No'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 're_account_no')->textInput(['maxlength' => true])->label("Re-enter Account No"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'required_load')->textInput(['maxlength' => true])->label('Required Load (Kva)'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'required_voltage')->textInput(['maxlength' => true])->label("Required Voltage"); ?>
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
