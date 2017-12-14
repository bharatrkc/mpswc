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
			<div class="caption"><i class="fa fa-list"></i>Factory license under the Factory Act, 1948</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<h3>Factory Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
				    <?= $form->field($model, 'photo_of_applicant', [ 'inputOptions' => [ 'required' => 'required', ]])->fileInput(['accept' => 'image/*'])->label('Photo of Applicant'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'full_name_and_address_of_principal_employer')->textInput(['maxlength' => true])->label("Full Name and Address of Principal Employer (in case of person; give name of father/ wife)"); ?>
			</div>
		</div>  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true])->label('Mobile  No.'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'email_id')->textInput(['maxlength' => true])->label("E Mail ID"); ?>
			</div>
		</div>     
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'nature_of_work')->textInput(['maxlength' => true])->label('Nature of work to be done in Establishment'); ?>
			</div> 
		</div>    


		<h3>Specifications  of Overseas Worker (Give separate details for every contractor )</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'overseas_worker_name_and_address_of_contractors')->textInput(['maxlength' => true])->label("Name and Address of Contractors"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'overseas_worker_naure_of_work')->textInput(['maxlength' => true])->label('Nature of the work in which the migrant workers are to be hired or to be  employed'); ?>
			</div> 
		</div>   

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'overseas_worker_maximum_no_of_workers')->textInput(['maxlength' => true])->label('Maximum no. of workers employed  by Contractor every day'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'overseas_worker_proposed_start_date')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Proposed start date of work under every Contractor'); ?>
			</div> 
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'overseas_worker_proposed_end_date')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Proposed end date of work for migrant worker under every contractor'); ?>
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