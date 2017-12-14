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
			<div class="caption"><i class="fa fa-list"></i>Registration under The Building and Other Construction Workers (Regulation of Employment and Conditions of Service) Act, 1996</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<h3>Establishment Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
				    <?= $form->field($model, 'establishment_complete_address')->textInput(['maxlength' => true])->label('Complete Address of the place of construction'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'establishment_telephone_no')->textInput(['maxlength' => true])->label("Telephone No."); ?>
			</div>
		</div>  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'establishment_fax_no')->textInput(['maxlength' => true])->label('Fax No.'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'establishment_aadhar_no')->textInput(['maxlength' => true])->label("Aadhar No."); ?>
			</div>
		</div>     
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'establishment_email_id')->textInput(['maxlength' => true])->label('Email Id'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'establishment_district')->textInput(['maxlength' => true])->label("District"); ?>
			</div>
		</div>    


		<h3>Work Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'work_details_estimated_date_of_commencement_of_work')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Estimated Date of Commencement of Work'); ?>
			</div> 
		</div>   

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'work_details_estimated_date_of_completion_of_work')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Estimated Date of Completion of work'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'work_details_maximum_number_of_labours')->textInput(['maxlength' => true])->label('Maximum number of labours to be employed in any day'); ?>
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