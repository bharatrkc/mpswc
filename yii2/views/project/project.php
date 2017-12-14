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
//use yii\jui\DatePicker; 
use kartik\date\DatePicker;

use dosamigos\ckeditor\CKEditor;

use app\models\MmLineOfActivitySector;
use app\models\MmLineOfActivity;


//$this->context->layout = 'fistimeInvestor';

$this->title = 'Add Project'; 
$this->params['breadcrumbs'][] = $this->title; 
?> 
<?php
if(count(Yii::$app->session->getAllFlashes())) {
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
}

$form = ActiveForm::begin(); 
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $this->title; ?></h2>		
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> 
	</div>
	<div class="col-lg-2"></div>
</div>
 
<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-investor add-project">
<div class="col-lg-12">
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>Project Details</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body">
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'project')->textInput(['maxlength' => true])->label('Project Name'); ?>  
			</div>
			<div class="col-lg-6">

			<?php

			$company_type = array();

			foreach($comp_type as $key=>$val)
			{
				$company_type[$comp_type[$key]['company_type_id']] = $comp_type[$key]['name'];
			}

			$itemsconstitution = ArrayHelper::map($answers_c, 'id', 'text');

			?>
				<?= $form->field($model, 'company')->dropdownList($itemsconstitution,
							['prompt' => 'Select', 'class' => 'form-control']
							)->label('Company/Unit Name'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<?= $form->field($model, 'investor_name')->textInput(['maxlength' => true])->label('Investor Name'); ?>
			</div>
			<div class="col-lg-6">
				<?= $form->field($model, 'designation')->textInput(['maxlength' => true])->label('Designation'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
			<?php

				$sector = array();
				foreach($sectors as $val) { 
					$id = $val['m2'];
					$sect = $val['name'];
					$sector["$id"] = $sect;
				} 
				asort($sector);  

				$arraysector = array();
				
				foreach($sectors as $key=>$val)
				{
					$arraysector[$sectors[$key]['m2']] = $sectors[$key]['name'];
				}

				$itemssector = ArrayHelper::map($answers_s, 'id', 'text');
			?>

			<?= $form->field($model, 'sector')->dropdownList( $itemssector , ['prompt' => 'Select', 'class' => 'form-control'])->label('Sector'); ?>

			</div>
			<div class="col-lg-6">

			<?php

					


			?>



				<?= $form->field($model, 'other_sector')->textInput(['maxlength' => true])->label('Others'); ?>  
		
			</div> 
		</div>
		<div class="row">
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
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Investment Limit (INR)'); ?>
			</div> 
			<div class="col-lg-6"> 
			  <?php /* $form->field($model, 'project_details')->widget(CKEditor::className(), [
					'options' => ['rows' => 6],
					'preset' => 'basic'
				])->label('Project Details');*/ ?>

				<?= $form->field($model, 'project_details')->textArea(['maxlength' => true, 'rows' => '4'])->label('Project Details'); ?>

			</div>
			<div class="col-lg-6">
 					<?php

					$itemsline = ArrayHelper::map($answers, 'id', 'text');
					//echo "<pre>";
					//print_r($questions);
					//print_r($answers);
					//echo "</pre>";
					//exit();
					foreach($answers as $answersx)
					{
						$itemslinex[$answersx->id] = array('pollution_val'=>$answersx['pollution_remark']);
					}
					//echo "<pre>";
					//print_r($itemslinex);
					//echo "</pre>";

					//exit();

					echo $form->field($model, 'line_of_activity')->dropDownList( $itemsline + ['0' => 'Other'], ['prompt' => 'Select', 
						'options' => $itemslinex
						,'class' => 'form-control']);

					?>
			</div>
				<div class="col-lg-6">
					<div style="float:left; width:50% !important;">
					<label class="control-label" style="width:100% !important; font-weight:none;">Pollution Category</label>
					</div>
					<div id="texturing" style="color:gray; float:left; font-size:15px;">
					</div>
			</div>
					<?= $form->field($model, 'pollution_category')->textInput(['maxlength' => true,'readOnly'=> true,'type'=>'hidden'])->label(false) ?>
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
			<?= $form->field($model, 'address')->textArea(['maxlength' => true, 'rows' => '4'])->label('Correspondence Address'); ?> 
			</div>  
		
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
  

	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>Proposed Project Requirements</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body">
		<div class="row">
			<div class="col-lg-6 checkbox i-checks"> 
				<?= $form->field($model, 'project_finalized')->radioList(['1' => 'Yes', '0' => 'No'])->label('Is Project Finalized'); ?> 
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'location')->textArea(['maxlength' => true, 'rows' => '4'])->label('Location'); ?>  
			</div> 
			<div class="col-lg-6"> 
				<?php 
				$items = ArrayHelper::map(District::find()->where(['state_id'=>1])->all(), 'district_id', 'name');
				echo $form->field($model, 'district')->dropDownList($items, 
				['prompt' => 'Select District', 'class' => 'form-control']); 
				?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6">  
				<?php echo $form->field($model, 'city')->dropDownList(['prompt' => 'Select City']); ?>
			</div> 

			<div class="col-lg-6">
				<?= $form->field($model, 'town')->dropDownList(['prompt'=>'Select']); ?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'land')->textInput(['maxlength' => true])->label('Land (Sq. Mt.)'); ?>  
			</div> 

			<div class="col-lg-6">
			<?= $form->field($model, 'total_investment')->textInput(['maxlength' => true])->label('Total Investment (Rs. in crores)'); ?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'power_load')->textInput(['maxlength' => true])->label('Power Load (KW)'); ?>  
			</div> 

			<div class="col-lg-6">
			<?= $form->field($model, 'water')->textInput(['maxlength' => true])->label('Water (KL / Day)'); ?> 
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6"> 
				<?= $form->field($model, 'commencement_date')->textInput(['readonly' => true])->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate'=>date('d-m-Y')
                                    ],
                                    'removeButton' => false,
                                    
                                ]);  ?> 
			</div> 

			<div class="col-lg-6">
			<?= $form->field($model, 'employment')->textInput(['maxlength' => true])->label('Employment'); ?> 
			</div> 
		</div>
	</div>
</div>
 

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<!--    <button id="getClickDraft">click</button> -->

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>

<?php
$this->registerJs(
'
$(document).ready(function(){
	 
     $("#investorprojects-line_of_activity").change(function(){

				
				if(($( "#investorprojects-line_of_activity" ).val())=="0")
				{
						$( "#'.Html::getInputId($model, 'pollution_category').'" ).val("White");						
						$("#texturing").css("color","gray");
						$("#texturing").html("White"); 
				}
				else
				{
						var data = $("option:selected", this).attr("pollution_val");
						$( "#'.Html::getInputId($model, 'pollution_category').'" ).val( data );
						$("#texturing").css("color",data);
						$("#texturing").html(data);
					
				}
	});
	
	 
	$("#investorprojects-total_investment").focusout(function(){  
		var value = $(this).val();
		var limit = $("#investorprojects-investment_limit").val();
		var limit_text= $("#investorprojects-investment_limit option:selected").val();
		 
		if(limit == 1) {
			 if(value*1 >= 10000000 ) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 2) {
			 if(value*1 > 100000000 && value*1 <= 10000000) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 3) {
			 if(value*1 > 1000000000 && value*1 <= 100000000) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 4) {
			 if(value*1 > 10000000000 && value*1 <= 1000000000) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 5) {
			 if(value*1 > 100000000000 && value*1 <= 10000000000) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 6) {
			 if(value*1 > 1000000000000 && value*1 <= 100000000000) {
				$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 7) {
			 if(value*1 < 1000000000000 ) {
			$(this).val("");
				alert("value should be with in investment limit selected above");
			 }
		}
		if(limit == 0) {
			$(this).val("");
			alert("Please select the investment limit in the project detail section");
		}
		 
	})


 	$("#investorprojects-other_sector").prop("disabled", true); 


		var xval = $("#investorprojects-sector > option:contains(\'Other\')").val();
		
		$("#investorprojects-sector > option:contains(\'Other\')").remove();

		$("#investorprojects-sector").append(\'<option value="\'+xval+\'">Other</option>\');


		var xvalc = $("#investorprojects-company > option:contains(\'Others\')").val();

		$("#investorprojects-company > option:contains(\'Others\')").remove();

		$("#investorprojects-company").append(\'<option value="\'+xvalc+\'">Others</option>\');

		function getFormData($form){
		    var unindexed_array = $form.serializeArray();
		    var indexed_array = {};

		    $.map(unindexed_array, function(n, i){
		        indexed_array[n["name"]] = n["value"];
		    });

		    return indexed_array;
		}
		$("#getClickDraft").click(function(){
			var $form = $("#w0");
			var data = getFormData($form);
			console.log(data);
		});

	    $("#investorprojects-sector").change(function(){

		var value = $(this).find(":selected").text();
 		if(value == "Other") {
			$("#investorprojects-other_sector").prop("disabled", false);
		}
		else {
			$("#investorprojects-other_sector").prop("disabled", true);
		}
	});

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