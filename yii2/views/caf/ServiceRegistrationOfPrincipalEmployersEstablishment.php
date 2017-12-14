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
			<div class="caption"><i class="fa fa-list"></i>Registration of principal employer's establishment under provision of The Contracts Labour (Regulation and Abolition) Act, 1970</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<h3>Establishment Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
				    <?= $form->field($model, 'establishment_nature_of_work')->textInput(['maxlength' => true])->label('Nature of work carried on in the Establishment'); ?>
			</div> 
		</div>  
		
		<h3>Principal Employer Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'principal_employer_name')->textInput(['maxlength' => true])->label("Name of Principal Employer"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'principal_employer_address')->textInput(['maxlength' => true])->label('Address'); ?>
			</div> 
		</div>     
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'principal_employer_mobile_no')->textInput(['maxlength' => true])->label("Mobile No."); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'principal_employer_email_id')->textInput(['maxlength' => true])->label('Email Id'); ?>
			</div> 
		</div>   
	
		<h3>Particulars of all Contractors and Contract Labour employed by them</h3>
		<div class="row">
			<div class="col-lg-6">
					<?= $form->field($model, 'contractors_name')->textInput(['maxlength' => true])->label("Name of Contractor"); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'contractors_address')->textInput(['maxlength' => true])->label('Address'); ?>
			</div> 
		</div>   

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'contractors_nature_of_work')->textInput(['maxlength' => true])->label("Maximum number of contract labour to be employed in any day by this contractor"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'contractors_maximum_number_of_contract_labour')->textInput(['maxlength' => true])->label('Email Id'); ?>
			</div> 
		</div>   

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'contractors_estimated_date_of_termination')->textInput(['maxlength' => true])->label("Estimated Date of Termination of employment of contract labour"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'contractors_add_contrator')->textInput(['maxlength' => true])->label('ADD CONTRACTOR'); ?>
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