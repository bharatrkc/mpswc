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
			<div class="caption"><i class="fa fa-list"></i>Registration under Boiler Act 1923 to work as erector/ repairer/ manufacturer</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">   

		<div class="row">  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'service_to_be_availed')->textInput(['maxlength' => true])->label('Service to be availed as'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'class_of_erector')->textInput(['maxlength' => true])->label("Class of erector/ repairer/ manufacturer"); ?>
			</div>
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'tan')->textInput(['maxlength' => true])->label('TAN'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'epfo_registration_no')->textInput(['maxlength' => true])->label("EPFO Registration No."); ?>
			</div>
		</div>  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'esi_registration_no')->textInput(['maxlength' => true])->label('ESI Registration No'); ?>
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