<?php
use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\State;
use app\models\Country;
use app\models\District;
use app\models\City;
use app\models\Town;
use yii\jui\DatePicker;

use dosamigos\ckeditor\CKEditor;


//$this->context->layout = 'fistimeInvestor';

$this->title = 'Add Project Details'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<style>
.container-fluid{margin:0px;border:0px;}
.row-bordered{border-bottom:1px solid #ccc;}
.col{border-bottom:1px solid #ccc;padding:8px 10px;min-height: 40px;}
.fa-list{font-size:20px;}
 
.hasDatepicker {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	box-shadow: none!important;
	outline: 0!important;
}
</style>
<?php
if(count(Yii::$app->session->getAllFlashes())) {
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
}

$form = ActiveForm::begin(); 
?>
<div class="container-fluid">
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>Project Details</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body">
		<div class="row">
			<div class="col-lg-12"> 
				<?= $form->field($model, 'project')->textInput(['maxlength' => true])->label('Project'); ?>  
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">
			<?= $form->field($model, 'sector')->dropdownList([
							'Manufacturing' => 'Manufacturing', 
							'Agriculture Food Processing' => 'Agriculture Food Processing', 
							'Automotive' => 'Automotive',
							'Healthcare and Hospitals' => 'Healthcare and Hospitals',
							'Tourism Hospitality' => 'Tourism Hospitality',
							'IT and ITeS' => 'IT and ITeS',
							'Mining and Minerals' => 'Mining and Minerals',
							'Pharmaceuticals' => 'Pharmaceuticals',
							'New and Renewable Energy' => 'New and Renewable Energy',
							'Textile' => 'Textile',
							'Real Estate' => 'Real Estate', 
							], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label('Sector'); ?> 

			</div>
			<div class="col-lg-6">
				<?= $form->field($model, 'investment_limit')->dropdownList([
							'1' => 'Less Than 1 Crore', 
							'2' => '1 Crore to 10 Crores', 
							'3' => '10 Crores to 100 Crores',
							'4' => '100 Crores to 1000 Crores',
							'5' => '1000 Crores to 10000 Crores',
							'6' => '10000 Crores to 100000 Crores',
							'7' => 'Above 100000 Crore',
							], 
							['prompt' => 'Select', 'class' => 'form-control selectpicker'] 
							)->label('Investment'); ?>
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-12"> 
			  <?php /* $form->field($model, 'project_details')->widget(CKEditor::className(), [
					'options' => ['rows' => 6],
					'preset' => 'basic'
				])->label('Project Details');*/ ?>

				<?= $form->field($model, 'project_details')->textArea(['maxlength' => true, 'rows' => '4'])->label('Project Details'); ?>

			</div> 
		</div> 

	</div>
	</div> 


	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>General Details</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body">
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'company')->dropdownList([
							'Proprietary' => 'Proprietary', 
							'Partnership' => 'Partnership', 
							'Public Limited' => 'Public Ltd. Company',
							'Private Limited' => 'Private Ltd. Company',
							'Co-Operative' => 'Cooperatives',
							'self_help_group' => 'Self Help Group',
							'LLP' => 'Limited Liability Partnership',
							'Trust' => 'Trust',
							'Others' => 'Others'
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Company/Unit Name'); ?>
			</div> 
			<div class="col-lg-6"> 
				<?= $form->field($model, 'designation')->textInput(['maxlength' => true])->label('Designation'); ?>  
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6">
			<?= $form->field($model, 'investor_name')->textInput(['maxlength' => true])->label('Investor Name'); ?> 
			</div> 
			<div class="col-lg-6">
			<?= $form->field($model, 'address')->textArea(['maxlength' => true, 'rows' => '4'])->label('Address'); ?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6">  
				<?php 
				$items = ArrayHelper::map(Country::find()->all(), 'country_id', 'name');
				echo $form->field($model, 'country')->dropDownList($items, ['prompt' => 'Select Country', 'class' => 'form-control']);
				?>

<?php

 /*
   $dataCategory=ArrayHelper::map(Country::find()->asArray()->all(), 'country_id', 'name');
    echo $form->field($model, 'country')->dropDownList($dataCategory, 
             ['prompt'=>'-Choose a Category-',
              'onchange'=>'
                        $.get( "'.Url::toRoute('/project/states').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'state').'" ).html( data );
                            }
                        );
                    ' 
				]); 
 
    $dataPost=ArrayHelper::map(State::find()->asArray()->all(), 'state_id', 'name');
    echo $form->field($model, 'state')->dropDownList(['prompt'=>'Select']);
   */
?> 
			</div> 

			<div class="col-lg-6">
			<?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email'); ?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'pincode')->textInput(['maxlength' => true])->label('Pincode'); ?>  
			</div> 

			<div class="col-lg-6">
			<?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label('Mobile no.'); ?> 
			</div> 
		</div>
  </div>
</div>
  
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<div class="row">&nbsp;<br>&nbsp;<br></div>
</div>

 
<?php
$this->registerJs(
'
$(document).ready(function(){

    $("#investorprojects-district").change(function(){ 
        $.get("'.Url::toRoute("/project/districtcities").'", { 
				id: $(this).val() } )
				.done(function( data ) {
                                $( "#'.Html::getInputId($model, 'city').'" ).html( data );
					}
				);
    });

	
	 $("#investorprojects-city").change(function(){ 
			$.get( "'.Url::toRoute('/project/citytowns').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'town').'" ).html( data );
                            }
			);

    });

});
', View::POS_READY, 'my-button-handler');

?>