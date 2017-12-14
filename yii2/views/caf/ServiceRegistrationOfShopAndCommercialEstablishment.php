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

//use yii\jui\DatePicker; 
use kartik\date\DatePicker;

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
			<div class="caption"><i class="fa fa-list"></i>Registration of Shop and Commercial Establishments under MP Shops and Establishments Act 1958</div>
			<div class="tools"> </div>
		</div> 
		<div class="portlet-body">  
		<div class="row"> 
			<div class="col-lg-12">  
					<?= $form->field($model, 'lin')->textInput(['maxlength' => true])->label('Labour Identification Number (LIN)'); ?>
			</div>  
		</div>  
		
		<h3>Shop / Establishment Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name of Shop / Establishment'); ?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'address')->textInput(['maxlength' => true])->label("Address"); ?>
			</div>
		</div>    
		
		<h3>Connection Address</h3>
		<div class="row"> 
			<div class="col-lg-6">
					<?php 
						$items = ArrayHelper::map(District::find()->where(['state_id'=>1])->all(), 'district_id', 'name');
						echo $form->field($model, 'district')->dropDownList($items, 
						['prompt' => 'Select District',]);
					?>
			</div> 
			<div class="col-lg-6">
					<?= $form->field($model, 'category')->textInput(['maxlength' => true])->label("Category of Shop/Establishment"); ?>
			</div>
		</div>    
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'shop_type')->textInput(['maxlength' => true])->label('Shop Type (Employee Wise)'); ?>
			</div>  
			<div class="col-lg-6">
					<?= $form->field($model, 'business_type')->textInput(['maxlength' => true])->label("Business Type"); ?>
			</div>
		</div>   
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'day_of_weekly_off')->textInput(['maxlength' => true])->label('Day of Weekly Off'); ?>
			</div>  
			<div class="col-lg-6">
					<?= $form->field($model, 'owner_type')->textInput(['maxlength' => true])->label("Owner Type"); ?>
			</div>
		</div>   
		<div class="row"> 
			<div class="col-lg-6">					
					<?= $form->field($model, 'business_start_date')->textInput(['readonly' => true])->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate'=>date('d-m-Y')
                                    ],
                                    'removeButton' => false,
                                    
                                ])->label('Business Start Date');  ?> 

			</div>  
			<div class="col-lg-6">
					<?= $form->field($model, 'no_of_years_for_registration')->textInput(['maxlength' => true])->label("No. of Years for Registration"); ?>
			</div>
		</div>   

		<h3>Employees Details</h3>
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'number_of_employees_male_female')->textInput(['maxlength' => true])->label('Number of Employees  Male Female'); ?>
			</div>  
			<div class="col-lg-6">
					<?= $form->field($model, 'name_of_accountant')->textInput(['maxlength' => true])->label("Name of Accountant / Business Executive"); ?>
			</div>
		</div>   
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'executive_address')->textInput(['maxlength' => true])->label('Executive Address'); ?>
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