<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

use dosamigos\ckeditor\CKEditor;

use app\models\MmLineOfActivity;


$controller_name = Yii::$app->controller->action->id;

if($controller_name=="prestablish")
{
	$action_name = "Pre Establishment";
}
else if($controller_name=="pre-operational")
{
	$action_name = "Pre Operational";
}
else if($controller_name=="internalwizard")
{
	$action_name = "Internal";
}

//echo ;

//$this->title = $project_name.'Service Wizard';

if(isset($investor_project[0]->project)) {
	$project_name = $investor_project[0]->project;
	$this->title = $action_name.' Service Wizard for : ' . $project_name;
}
 
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'wizardForm',
    'options' => ['class' => 'form-horizontal'],
]);

?>
<style>
.form-horizontal .control-label { 
    text-align: left;
}
div.required label.control-label:after {
    content: " *";
    color: red;
}
.form-horizontal .form-group.radio-grp{
    padding-right: 15px;
    float: left;
    margin: 0px;
} 
.radio-grp label{
 margin:0px;padding:0px;

 padding: 0px 10px;margin:0px;float: left;width: 100%;display: block;
}
.form-horizontal .form-group.radio-grp:last-child{margin-bottom: 20px;}
.form-horizontal .form-group.radio-grp:first-child{margin-left: -15px;}

/*---radio style--*/

label.btn span {
  font-size: 1.5em ;
}

label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 2em;
text-align: left;
white-space: nowrap;
vertical-align: top;
cursor: pointer;
background-color: none;
border: 0px solid 
#c8c8c8;
border-radius: 3px;
color: #c8c8c8;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}

div[data-toggle="buttons"] label:hover {
color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
-webkit-box-shadow: none;
box-shadow: none;
}

.portlet-body {
    background: #FFF;
    padding:15px;
}
.portlet-body .control-label{width:100%;}
</style> 

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $this->title; ?></h2>		
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> 
	</div>
	<div class="col-lg-2"></div>
</div>


<?php
  
$form = ActiveForm::begin([
				'id' => 'wizardForm',				
					'options' => 
						['class' => 'form-horizontal',  
						'ng-app' => 'myApp', 
						'ng-controller' => 'validateCtrl',  
						'name' => "wizardForm",],
				]); 
 
?> 

<div class="wrapper-content">


	<div class="portlet box green">
 
<?php
// echo $form->errorSummary($model);

$post_names = array();
//itrate question groups
//exit();
?>
<div class="hideshow hide">
<?php

$qids_toselect = "anyid";

		if(isset($questions_depq)) // count($questions_depq)>0
		{
			$qids_toselect = $questions_depq[0]->id;

			foreach ($answers_depqa as $depk => $depv) {

				?>
				
				<input type="hidden" name="wizardForm[]" value="" data-dependentquestions="<?php echo $depv['dependent_questions']; ?>" />
				
				<?php
			
			}
				if(trim($questions_depq[0]->render_type) == 'Drop Down'):

					$post_names[$questions_depq[0]->id] = $questions_depq[0]->text;

					$parent_id = '';
					if($questions_depq[0]->parent_id):  
						$parent_id = 'data-parentid="' . $questions_depq[0]->parent_id . '"';
					endif;
				?>
					<div class="form-group" id="abbr_section">

					<select id="<?= $questions_depq[0]->id ?>"  data-validation="required" name="wizardForm[<?= $questions_depq[0]->id ?>]"  <?= $parent_id ?> class="form-control" abbr_val="<?= $questions_depq[0]->abbr_remark ?>" ng-model="select_<?= $questions_depq[0]->id ?>">
						<option value="">Select</option>
						<?php
							foreach ($answers_depq as $answer):
								if($answer->question_id == $questions_depq[0]->id):

									$parentansid = '';
									if($answer->parent_ans_id):  
										$parentansid = 'data-parentansid="' . $answer->parent_ans_id . '"';
									endif; 

									$dependentquestions = '';
									if($answer->dependent_questions):  
										$dependentquestions = 'data-dependentquestions="' . $answer->dependent_questions . '"';
									endif;
							?>
								<option value="<?= $answer->id ?>" <?= $parentansid ?> selected="selected" <?= $dependentquestions ?> ><?= $answer->text ?></option> 
							<?php
								endif;   
							endforeach;
								
									?>
					</select> 
					</div>
				<?php 					 
			    endif; 
}
?>
</div>
<?php


foreach ($questiongroups as $questiongroup): ?>

			<div class="portlet-title"><div class="caption"><i class="fa fa-list"></i><?php echo $questiongroup[0]->heading ?></div>
                        
			</div>
        
        <div class="portlet-body">
        
		
		<?php 
		$i=0;
		//itrate questions
		foreach ($questions as $question): 
			if($question->grp_id == $questiongroup[0]->id): 
				$i++;
		?>
		<div class="row hideshow required">


		<?php
			//echo "<pre>"; print_r($question); echo "</pre>";

			if(($question->abbr_remark)=="pollution")
				{
			?>
			<div class="col-lg-6">
			<label class="control-label" for="<?= $question->id ?>">Pollution Category</label>
			</div>
			<div class="col-lg-3">
						
				
						<div style="font-weight:bold;" id="pollution_cat">
						
						</div>
						
						
						<input type="hidden" name="wizardForm[<?= $question->id ?>]" value="70" abbr_val="pollution" />
						
			</div>
			<div class="col-lg-1">
			</div>
			</div>
				<?php
					continue;
				}
			?>




			<div class="col-lg-6">
				<?php //echo $i; ?>
				<label for="<?= $question->id ?>" class="control-label"><?= $question->text ?></label> 
			</div>
			<div class="col-lg-5"> 
			<?php 
				if(trim($question->render_type) == 'Drop Down'):

					$post_names[$question->id] = $question->text;

					$parent_id = '';
					if($question->parent_id):  
						$parent_id = 'data-parentid="' . $question->parent_id . '"';
					endif; 
				?>	
					<div class="form-group"  ng-class="{true: 'error'}[submitted && wizardForm.select_<?= $question->id ?>.$invalid]">

					<select id="<?= $question->id ?>"  data-validation="required" name="wizardForm[<?= $question->id ?>]" <?php 
					
					if($question->abbr_remark=='line_of_activity'){ echo " abbr_val='line_of_activity' "; } 

					else if($question->abbr_remark=='sector'){ echo " abbr_val='sector' "; }

					else if($question->abbr_remark=='constitution'){ echo " abbr_val='constitution' "; }

					?> <?= $parent_id ?> class="form-control" ng-model="select_<?= $question->id ?>">
						<option value="">Select</option>
						<?php
							foreach ($answers as $answer):		
								if($answer->question_id == $question->id):

									$parentansid = '';
									if($answer->parent_ans_id):  
										$parentansid = 'data-parentansid="' . $answer->parent_ans_id . '"';
									endif; 

									$dependentquestions = '';
									if($answer->dependent_questions):  
										$dependentquestions = 'data-dependentquestions="' . $answer->dependent_questions . '"';
									endif;
							?> 
								<option value="<?= $answer->id ?>" <?php 

								if(($question->abbr_remark)=="line_of_activity")
									{
										echo ' pollution_val = "'.$answer->pollution_remark.'" ';
									}

								if(($question->abbr_remark == 'sector') && ($investor_project[0]->sector == $answer->id) ) {

									echo ' selected = "selected" ';
								
								}
								elseif(($question->abbr_remark == 'line_of_activity') && ($investor_project[0]->line_of_activity == $answer->id) ) {

									echo ' selected = "selected" ';
								
								}
								elseif(($question->abbr_remark == 'constitution') && ($investor_project[0]->company == $answer->id) ) {

									echo ' selected = "selected" ';
								
								}

								 ?> <?= $parentansid ?> <?= $dependentquestions ?>><?= $answer->text ?></option> 
							<?php
								endif;   
							endforeach;
								if(($question->abbr_remark)=="line_of_activity")
									{
										?>
										
										<option value="0" <?php echo 'pollution_val = "White" '; ?> >Others</option>
										
										<?php
									}
									?>
					</select> 
					</div>
				<?php 					 
			    endif; 
				//---all radio fields
				if($question->render_type == 'Radio Button'):

					$post_names[$question->id] = $question->text;

					$parent_id = '';
					if($question->parent_id):  
						$parent_id = 'data-parentid="'.$question->parent_id.'"';
					endif; 
					?>
					<div class="form-group">

						<?php

						foreach (($answers) as $answer): 
							if($answer->question_id == $question->id):

								$parentansid = '';
								if($answer->parent_ans_id):  
									$parentansid = 'data-parentansid="'.$answer->parent_ans_id.'"';
								endif; 

								$dependentquestions = '';
								if($answer->dependent_questions):
									$dependentquestions = 'data-dependentquestions="'.$answer->dependent_questions.'"';
								endif;
						?>		  

								<input type="radio" data-validation="required" id="<?= $question->id.'_'.$answer->id ?>" name="wizardForm[<?= $question->id ?>]" value="<?= $answer->id ?>" <?= $dependentquestions ?>  ng-model="radio_<?= $question->id ?>"  /><label for="<?= $question->id.'_'.$answer->id ?>"> <?= $answer->text ?></label>
							 &nbsp;&nbsp;
 

						<?php 
							endif;
						endforeach; 
						?>    
					</div>
					<?php
			    endif;
				//---all multiselect
				if($question->render_type == 'Multiple Choice'):  
					$post_names[$question->id] = $question->text;

					$parent_id = '';
					if($question->parent_id):  
						$parent_id = 'data-parentId="'.$question->parent_id.'"';
					endif; 
					?>
					<div class="form-group">
						<select id="<?= $question->id ?>" size="6"  name="wizardForm[<?= $question->id ?>][]" <?= $parent_id ?>  multiple="multiple" class="form-control" ng-model="multiple_<?= $question->id ?>"  data-validation="required">
							<?php
							foreach ($answers as $answer):		
								if($answer->question_id == $question->id): 

									$parentansid = '';
									if($answer->parent_ans_id):  
										$parentansid = 'data-parentansid="'.$answer->parent_ans_id.'"';
									endif; 

									$dependentquestions = '';
									if($answer->dependent_questions):  
										$dependentquestions = 'data-dependentquestions="'.$answer->dependent_questions.'"';
									endif;   
							?> 
								<option value="<?= $answer->id ?>" <?= $dependentquestions ?> <?= $parentansid ?>><?= $answer->text ?></option> 
							<?php
								endif;   
							endforeach; 
							 ?>
						</select>  
					</div>
					<?php 
				endif; 
				?> 
		</div>
		</div>
		<?php endif; ?>
	<?php endforeach; ?> 
    </div>
</div>
<div class=" box green">
<?php endforeach; ?>
	<input type="hidden" name="servicew" value="<?php echo htmlentities(serialize($post_names)); ?>"/>

	<div class="row">
		<div class="form-group text-center">
			<div class="col-lg-offset-1 col-lg-11">
				<p>&nbsp;</p>  
				
				<?= Html::submitButton('Submit', [
				'class' => 'btn btn-primary',   
				'ng-click' => 'submitted=true',  
				]) ?> 
			</div>
		</div>
	</div>

	<?php ActiveForm::end() ?> 
	<div id="cascadingCombos" style="display:none"></div> 

</div>


<?php 


$this->registerJs(
'$.validate({
  borderColorOnError : "#ff0000",
  addValidClassOnAll : true
});


$("select[abbr_val=\'line_of_activity\']").change(function(){

	var polVal = $("option:selected", this).attr("pollution_val");
    if(polVal=="White")
    {
	$("#pollution_cat").css("color","gray");
	$("input[abbr_val=\'pollution\']").val("70");
	}
	else
	{
	$("#pollution_cat").css("color",polVal);
	$("input[abbr_val=\'pollution\']").val("71");
	}
	$("#pollution_cat").html(polVal);
});


$("#'.$qids_toselect.'").change();

$("select[abbr_val=\'sector\']").change();
$("select[abbr_val=\'line_of_activity\']").change();
$("select[abbr_val=\'constitution\']").change();


', View::POS_READY, 'my-button-handler');

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/wizard.js',['depends' => [\yii\web\JqueryAsset::className()]]); 


$this->registerJsFile(
    Yii::$app->request->baseUrl.'/js/jquery.form-validator.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<script>
var app = angular.module('myApp', []); 
app.controller('validateCtrl', function($scope) {}); 

</script>