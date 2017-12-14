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
			<div class="caption"><i class="fa fa-list"></i>Factory license under the Factory Act, 1948</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<h3>Factory Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'lin_number')->textInput(['maxlength' => true])->label('LIN Number'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'factory_licence_under_if_already_registered_before')->textInput(['maxlength' => true])->label("Factory licence under if already registered before"); ?>
			</div>
		</div>  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'application_for_the_registration_of_license_for_the_year')->textInput(['maxlength' => true])->label('Application for the Registration of License for the Year'); ?>
			</div> 
		</div>    

		<h3>Full name and residential address of the Occupant</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label("Full Name of the Occupant"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'father_name')->textInput(['maxlength' => true])->label('Father Name'); ?>
			</div> 
		</div>    
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'address')->textInput(['maxlength' => true])->label("Address"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'occupant_status')->textInput(['maxlength' => true])->label('Occupant status'); ?>
			</div> 
		</div>   

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'state')->textInput(['maxlength' => true])->label('State'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'district')->textInput(['maxlength' => true])->label('District'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'division_office')->textInput(['maxlength' => true])->label('Division Office'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'pincode')->textInput(['maxlength' => true])->label('Pin Code'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true])->label('Mobile No'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'email_id')->textInput(['maxlength' => true])->label('Email ID'); ?>
			</div> 
		</div> 
		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'aadhar_no')->textInput(['maxlength' => true])->label('Aadhar Number'); ?>
			</div>  
		</div>
		
		<h3>Nature of manufacturing process or processes</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'carried_the_factory_last_12_months')->textInput(['maxlength' => true])->label('Carried on in the factory in the last 12 months (in case of all factories already in existence )'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'carried_factory_during_next_12_months')->textInput(['maxlength' => true])->label('To be carried on in the factory during the next 12 months (in the case of all factories)'); ?>
			</div>  
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'whether_involves_hazardous_processes')->textInput(['maxlength' => true])->label('Whether it involves hazardous processes as interpreted'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'whether_involves_any_dangerous_operation')->textInput(['maxlength' => true])->label('Whether it involves any dangerous operation wholly or partly , as declared under sub-rule (1) of the rule 107 under section 87.'); ?>
			</div>  
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'whether_any_chemical_substance')->textInput(['maxlength' => true])->label('Whether any chemical substance as specified under second schedule of the Act id used, handled, stored or processed threat'); ?>
			</div>  
		</div> 

		<h3>Names, Quantities and value or principal product manufactured during the last 12 months (in case of factories already in existence)</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'quantity')->textInput(['maxlength' => true])->label('Quantity'); ?>
			</div>  
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'value')->textInput(['maxlength' => true])->label('Value'); ?>
			</div> 
		</div>
		
	
		<h3>Worker Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'fee_schedule')->textInput(['maxlength' => true])->label('Fee Schedule Applicable'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'maximum_number_of_worker_proposed_to_employed_on_any_one_day')->textInput(['maxlength' => true])->label('Maximum Number of worker proposed to be employed on any one day during the year'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'maximum_number_workers_employed_one_day_during_last_12months')->textInput(['maxlength' => true])->label('Maximum number of workers employed on any one day during the last 12 months (in case of factories already in existence)'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_workers_employed_in_the_factory')->textInput(['maxlength' => true])->label('Number of workers to be ordinarily employed in the factory'); ?>
			</div> 
		</div> 

		<h3>Nature and total amount of powers (HP)</h3>
		<div class="row"> 
			<div class="col-lg-12">  
					<?= $form->field($model, 'installed_machinery_power_in_horse_power')->textInput(['maxlength' => true])->label('Installed Machinery Power in Horse Power'); ?>
			</div>  
		</div> 


		<h3>Reference number(s) and date of approval / allotment of site whether for old and new building and for construction or extension of factory by the state</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'allotment_reference_number')->textInput(['maxlength' => true])->label('Reference Number(s)'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'allotment_date_of_approval')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Date of Approval'); ?>
			</div>  
		</div> 

		<h3>Reference number and date of approval of arrangements if any, made for the disposal of trade waste and effluent and the name authority granting such approval</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'arrangements_reference_number')->textInput(['maxlength' => true])->label('Vat number/cst number/professional tax registration number/it number'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'arrangements_name_of_authority')->textInput(['maxlength' => true])->label('Have you applied previously for a manufacturer\'s license? If yes when with what result.'); ?>
			</div>  
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'arrangements_date_of_approval')->textInput(['maxlength' => true])->label('Vat number/cst number/professional tax registration number/it number'); ?>
			</div> 
		</div> 

		<h3>Reference numbers(s) and date (s) of approval of plans under rule 3 or M.P factories Rules 1962 by chief inspector of MP</h3>
		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'plans_reference_number')->textInput(['maxlength' => true])->label('Have you applied previously for a manufacturer\'s license? If yes when with what result.'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'plans_date_of_approval')->textInput(['maxlength' => true])->label('Vat number/cst number/professional tax registration number/it number'); ?>
			</div> 
		</div>

		<div class="row">
			<div class="col-lg-6">  
				<?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Have you applied previously for a manufacturer\'s license? If yes when with what result.'); ?>
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