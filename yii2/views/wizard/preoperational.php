<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Pre Operational Service Wizard';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'wizardForm',
    'options' => ['class' => 'form-horizontal'],
])
?>
<style>

.form-horizontal .control-label { 
    text-align: left;
}
div.required label.control-label:after {
    content: " *";
    color: red;
}

</style>

<div class="portlet box green">

	<div class="portlet-title">
		<div class="caption">
			<i style=" font-size:20px;" class="fa fa-list"></i><?= Html::encode($this->title) ?>
		</div>
		<div class="tools"></div>
	</div>


	<div class="portlet-body"> 
<div class="container-fluid" style="margin:0px;border:0px;">
	
	<div class="row"> 
		<div class="col-lg-6"></div>
		<div class="col-lg-3"> 
			<input type="hidden" id="sector" value="5"/>
		</div>
	</div>

<?php
$post_names = array();
//itrate question groups
foreach ($questiongroups as $questiongroup): ?>
		<?php 
		$i=0;
		//itrate questions
		foreach ($questions as $question): 

			if($question->grp_id == $questiongroup->id): 
				$i++; 
		?>
		<div class="row hideshow required"> 
			<div class="col-lg-6">
				<?php //echo $i; ?>
				<label class="control-label" for="<?= $question->id ?>"><?= $question->text ?></label> 
			</div>
			<div class="col-lg-3"> 
			<?php 
				if($question->render_type == 'Drop Down'):

					$post_names[$question->id] = $question->text;

					$parent_id = '';
					if($question->parent_id):  
						$parent_id = 'data-parentId="'.$question->parent_id.'"';
					endif; 
				?>	
					<div class="form-group">
					<select id="<?= $question->id ?>" data-validation="required" name="wizardForm[<?= $question->id ?>]" <?= $parent_id ?> class="form-control">
						<option value="">Select</option>
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
								<option value="<?= $answer->id ?>" <?= $parentansid ?> <?= $dependentquestions ?>><?= $answer->text ?></option> 
							<?php
								endif;   
							endforeach; 
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
						$parent_id = 'data-parentId="'.$question->parent_id.'"';
					endif; 
					?>
					<div class="form-group checkbox i-checks">
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

					<input type="radio"  data-validation="required" id="<?= $question->id.'_'.$answer->id ?>" name="wizardForm[<?= $question->id ?>]" value="<?= $answer->id ?>" <?= $dependentquestions ?>  ng-model="radio_<?= $question->id ?>"  /><label for="<?= $question->id.'_'.$answer->id ?>"> <?= $answer->text ?></label>&nbsp;&nbsp;

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
					<?php
						echo "<pre>";
						print_r($answers);
						echo "</pre>";
					?>
					<select id="<?= $question->id ?>" name="wizardForm[<?= $question->id ?>][]" <?= $parent_id ?>  multiple="multiple" class="form-control" data-validation="required">
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
<?php endforeach; ?>
	 
	<!-- <input type="hidden" name="servicew" value='<?php //echo serialize($post_names); ?>'/> 
 -->
	  <div class="row">
		<div class="form-group text-center">
			<div class="col-lg-offset-1 col-lg-11">
				<p>&nbsp;</p> 
				<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
		</div>
	 </div>
	<?php ActiveForm::end() ?>

	<div class="row"><br>&nbsp;</div>
	<div id="cascadingCombos" style="display:none"></div>

</div>
</div>


<?php 

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/wizard.js',['depends' => [\yii\web\JqueryAsset::className()]]); 



$this->registerJsFile(
    Yii::$app->request->baseUrl.'/js/jquery.form-validator.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);


$this->registerJs(
"$.validate({
  borderColorOnError : '#ff0000',
  addValidClassOnAll : true
});
", View::POS_READY, 'my-button-handler');

?> 