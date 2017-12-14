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
			<div class="caption"><i class="fa fa-list"></i>Permission for engaging contractor for labour under provision of The Contracts Labour (Regulation and Abolition) Act, 1970</div>
			<div class="tools"> </div>
		</div> 

		<div class="portlet-body">   
			
			<h3>Contractor Information</h3>
			<div class="row"> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'name_of_contractor')->textInput(['maxlength' => true])->label('Name of Contractor / Contractor Institute'); ?>
				</div>  
				<div class="col-lg-6">  
						<?= $form->field($model, 'name_of_father_husband')->textInput(['maxlength' => true])->label('Name of father / husband in case of Person'); ?>
				</div> 
			</div> 
			<div class="row">  
				<div class="col-lg-6">  
						<?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Address'); ?>
				</div>  
				<div class="col-lg-6">  
						<?= $form->field($model, 'pincode')->textInput(['maxlength' => true])->label('PIN Code'); ?>
				</div> 
			</div> 
			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'telephone_no')->textInput(['maxlength' => true])->label("Telephone no"); ?>
				</div>
				<div class="col-lg-6">  
						<?= $form->field($model, 'fax_no')->textInput(['maxlength' => true])->label('Fax No.'); ?>
				</div> 
			</div>

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'email_id')->textInput(['maxlength' => true])->label("E mail ID"); ?>
				</div>
				<div class="col-lg-6">  
						<?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true])->label('Mobile Number'); ?>
				</div> 
			</div> 

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'aadhar_no')->textInput(['maxlength' => true])->label("Aadhar No."); ?>
				</div> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'dob')->textInput(['maxlength' => true])->label('Date of Birth'); ?>
				</div> 
			</div>

			<div class="row">
				<div class="col-lg-6">  
						<?= $form->field($model, 'district')->textInput(['maxlength' => true])->label('District (Issuer Office)'); ?>
				</div>   
			</div>


			<h3>Specification of Principal Employer of particular establishment / Institute under which the contract labour should be employed</h3>
			<div class="row">			
				<div class="col-lg-6">
						<?= $form->field($model, 'principal_employer_name_of_establishment')->textInput(['maxlength' => true])->label("Name of the establishment"); ?>
				</div> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'principal_employer_estb_address')->textInput(['maxlength' => true])->label('Address'); ?>
				</div> 
			</div>

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'principal_employer_type_of_business')->textInput(['maxlength' => true])->label("Type of business, industry, manufacturing or occupation which is done in the establishment"); ?>
				</div> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'principal_employer_certificate_of_registration')->textInput(['maxlength' => true])->label('Certificate of registration for establishment'); ?>
				</div> 
			</div>

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'principal_employer_date_of_registration')->textInput(['maxlength' => true])->label("Date of Registration"); ?>
				</div> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'principal_employer_name')->textInput(['maxlength' => true])->label('Name of the Principal Employer'); ?>
				</div> 
			</div>

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'principal_employer_address')->textInput(['maxlength' => true])->label("Address"); ?>
				</div> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'principal_employer_mobile_no_of_principal_planner')->textInput(['maxlength' => true])->label('Mobile Number of Principal Planner'); ?>
				</div> 
			</div>

			<div class="row"> 
				<div class="col-lg-6">
						<?= $form->field($model, 'principal_employer_email')->textInput(['maxlength' => true])->label("E-mail ID of Principal Employer"); ?>
				</div> 
			</div>
			

			<h3>Specifications of Contract Workers</h3>
			<div class="row"> 
				<div class="col-lg-6">  
						<?= $form->field($model, 'contract_workers_name_of_the_work')->textInput(['maxlength' => true])->label('Nature of the work that is contracted or employed in the establishment'); ?>
				</div> 
				<div class="col-lg-6">
						<?= $form->field($model, 'contract_workers_maximum_number')->textInput(['maxlength' => true])->label("Maximum number of contract workers"); ?>
				</div> 
			</div>

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'contract_workers_proposed_start_date')->textInput(['maxlength' => true])->label('Proposed start date of contract work'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'contract_workers_proposed_end_date')->textInput(['maxlength' => true])->label("Proposed end date of contract work"); ?>
			</div> 
		</div>

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'contract_workers_manager_name')->textInput(['maxlength' => true])->label('Contractor\'s agent or manager\'s name'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'contract_workers_manager_address')->textInput(['maxlength' => true])->label("Address of the agent or manager"); ?>
			</div>  
		</div>

			<h3>Other Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'other_details_contractor_convicted_of_any_crime')->textInput(['maxlength' => true])->label("Has the contractor convicted of any crime in the last five years?"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'other_details_report_crime')->textInput(['maxlength' => true])->label('Report Crime'); ?>
			</div> 
		</div>

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'other_details_was_any_order_to_suspend_license')->textInput(['maxlength' => true])->label("Was there any order to cancel or suspend the license against the contractor or to integrate the security deposit of an earlier contract?"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'other_details_order_date')->textInput(['maxlength' => true])->label('Order date'); ?>
			</div> 
		</div>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'other_details_has_contractor_worked_any_other_establishment')->textInput(['maxlength' => true])->label("Has the contractor worked in any other establishment for the last five years?"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'other_details_name_of_employer')->textInput(['maxlength' => true])->label('Name of the employer'); ?>
			</div> 
		</div>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'other_details_establishment_name')->textInput(['maxlength' => true])->label("Establishment Name"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'other_details_nature_of_work')->textInput(['maxlength' => true])->label('Nature of Work'); ?>
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