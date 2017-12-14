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
use app\models\AkvnMaster;

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
			<div class="caption"><i class="fa fa-list"></i>Water Connection by AKVN</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<div class="row"> 
			<div class="col-lg-6">   
			<?php
			 
				$query = AkvnMaster::find();  

				$items = ArrayHelper::map(  $query->select('akvn')->distinct()->all(), 'akvn', 'akvn');
				echo $form->field($model, 'akvn')->dropDownList($items, 
				['prompt' => 'Select AKVN', 'class' => 'form-control'])->label('AKVN');

			?> 
			</div> 
			<div class="col-lg-6">
			<?php
				
				$query = AkvnMaster::find(); 
				$items = ArrayHelper::map(  $query->select('district')->distinct()->all(), 'district', 'district');
				
				echo $form->field($model, 'industrial_area')->dropDownList($items, 
				['prompt' => 'Select Industrial Area', 'class' => 'form-control'])->label('Industrial Area');
			?> 
			</div>
		</div>  
		
		<h3>Connection Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Address'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'plot_number')->textInput(['maxlength' => true])->label("Plot Number"); ?>
			</div>
		</div>    
		
		<h3>Connection Address</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'pincode')->textInput(['maxlength' => true])->label('Pincode'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'size_of_water_connection_applied')->dropdownList([
							'15mm' => '15mm', 
							'20mm' => '20mm', 
							'25mm' => '25mm', 
							'40mm' => '40mm', 
							'50mm' => '50mm',
							'others' => 'others',
							], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label("Size of water connection applied"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'water_requirement')->textInput(['maxlength' => true])->label('Water Requirement (per day) minimum'); ?>
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