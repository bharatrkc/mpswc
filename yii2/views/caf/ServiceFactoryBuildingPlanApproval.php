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

$this->title = 'Factory Building Plan Approval'; 
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
			<div class="caption"><i class="fa fa-list"></i>Factory Building Plan Approval</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">

		<h3>Manufacturing Process</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'manufacturing_process_will_be_follow')->textInput(['maxlength' => true])->label('Will be Follow (If new factory ) / Currently Following (in present) give details'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'manufacturing_process_involves_hazardous_processes')->textInput(['maxlength' => true])->label("Whether it involves hazardous processes"); ?>
			</div>
		</div>		
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'manufacturing_process_involves_any_dangerous_operation')->textInput(['maxlength' => true])->label('Whether it involves any dangerous operation wholly or partly'); ?>
			</div>
			<div class="col-lg-6">
					<?= $form->field($model, 'manufacturing_process_any_chemical_substance')->textInput(['maxlength' => true])->label("Whether any chemical substance as specified under second schedule of the Act id used, handled, stored or processed threat"); ?>
			</div>
		</div>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'manufacturing_process_provisions_of_establishment')->textInput(['maxlength' => true])->label('the provisions of establishment / arrangement under the relevant schedule has been included'); ?>
			</div> 
		</div>   
		
		<h3>Workers Details</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'workers_details_workers_employed')->textInput(['maxlength' => true])->label("No. of workers employed in every room in Factory"); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'workers_details_key_facilities')->textInput(['maxlength' => true])->label('Is all key facilities and arrangements of workers are been taken care of in plan as per the Act and Rule'); ?>
			</div>  
		</div>

		<h3>Details of Machines</h3>
		<div class="row">
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_machines_any_lift')->textInput(['maxlength' => true])->label('In the project Is there any Lift / Lifting Equipment /Lifting Machine has been Installed/ Installation has to be done'); ?>
			</div>  
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_machines')->textInput(['maxlength' => true])->label('the provision of act and rule has been taken care in above plan'); ?>
			</div>  
		</div>   
		
		<h3>Job Description</h3>
		<div class="row"> 
			<div class="col-lg-12">  
					<?= $form->field($model, 'job_description_chances_of_falling')->textInput(['maxlength' => true])->label('Has any of the worker needs to work from any ground which on height from where the chances of falling or location where space is less due to machinery and equipment  or deep excavation work is required to be done by the worker'); ?>
			</div>  
		</div>

		<h3>Emergency Exit Details</h3>
		<div class="row"> 
			<div class="col-lg-12">  
					<?= $form->field($model, 'emergency_exit_details_chances_of_spreading_hazardous_smoke')->textInput(['maxlength' => true])->label('Is there any chances of spreading Hazardous smoke / smoke / explosion? If yes than as per the provision of act and rule suitable arrangements has been taken care in plan'); ?>
			</div>  
		</div>

		<h3>For construction what material will be used</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'construction_for_building')->textInput(['maxlength' => true])->label('For Building (give details)'); ?>
			</div>
			<div class="col-lg-6">
					<?= $form->field($model, 'construction_for_roof')->textInput(['maxlength' => true])->label('For Roof (give details)'); ?>
			</div>
		</div>

		<h3>Industry under Factory Act 1948</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'industry_under_factory_type_of_factory')->textInput(['maxlength' => true])->label('Type of Factory'); ?>
			</div>
			<div class="col-lg-6">  
					<?= $form->field($model, 'industry_under_factory_no_of_workers')->textInput(['maxlength' => true])->label('No. of Workers'); ?>
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