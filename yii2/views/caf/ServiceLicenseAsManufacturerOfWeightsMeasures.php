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
			<div class="caption"><i class="fa fa-list"></i>License as Manufacturer of Weights & Measures</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'date_of_establishment_of_workshop')->widget(DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'class' => 'form-control'])->label('Date of establishment of workshop/factory'); ?>
			</div> 
		</div>  

		<div class="row"> 
			<h3>The types of weights and measures proposed to be manufactured viz</h3>
			<div class="col-lg-6">
					<?= $form->field($model, 'types_of_weights_and_measures')->textInput(['maxlength' => true])->label("Measures"); ?>
			</div>
			<div class="col-lg-6">
					<?= $form->field($model, 'types_of_weights_and_measures_instruments')->textInput(['maxlength' => true])->label("Weighing instruments"); ?>
			</div>
		</div>  

		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'types_of_weights_and_measures_instruments_details')->textInput(['maxlength' => true])->label("Measuring instruments with details in each case"); ?>
			</div>
		</div>  

		<div class="row"> 
			<h3>The number of persons employed/proposed to be employed</h3>
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_of_persons_employed_semi_skilled')->textInput(['maxlength' => true])->label('Semi-skilled'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_of_persons_employed_semi_unskilled')->textInput(['maxlength' => true])->label('Unskilled'); ?>
			</div> 
		</div>  

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_of_persons_employed_specialist')->textInput(['maxlength' => true])->label('Specialist trained in line'); ?>
			</div> 
		</div>  

		<div class="row">  
			<div class="col-lg-6">
					<?= $form->field($model, 'monogram_trademark')->textInput(['maxlength' => true])->label("The monogram/trademark intended to be imprinted on weights and measures to be manufactured"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'details_of_machinery')->textInput(['maxlength' => true])->label('Details of machinery, tools, accessories owned and used for manufacturing weights and measures etc.'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'details_of_foundry')->textInput(['maxlength' => true])->label("Details of foundry or workshop facilities arranged. Whether ownership or long term lease etc."); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'facilities_of_steel_casting')->textInput(['maxlength' => true])->label('Facilities of steel casting and hardness testing of vital parts etc. Or other means'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'availability_of_electrical_energy')->textInput(['maxlength' => true])->label('Availability of electrical energy'); ?>
			</div>  
		</div>   

		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'whether_any_loan_received')->textInput(['maxlength' => true])->label('Whether any loan received from government or financial institution. If yes give details'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'name_of_bankers')->textInput(['maxlength' => true])->label('Name of bankers if any'); ?>
			</div>  
		</div> 
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'vat_number')->textInput(['maxlength' => true])->label('Vat number/cst number/professional tax registration number/it number'); ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'have_you_applied_previously_for_a_manufacturer_license')->textInput(['maxlength' => true])->label('Have you applied previously for a manufacturer\'s license? If yes when with what result.'); ?>
			</div>  
		</div>
		<div class="row"> 
			<div class="col-lg-6">
					<?= $form->field($model, 'whether_the_item_proposed_to_be_manufactured')->textInput(['maxlength' => true])->label('Whether the item(s) proposed to be manufactured will be sold within the state/outside the state;
When can you produce for inspection samples of your products for which license are desired?'); ?>
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