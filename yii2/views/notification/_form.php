<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View; 
use yii\jui\AutoComplete;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model app\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>


	
<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-notification create">
	<div class="col-lg-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Notification</div>
					<div class="tools"> </div>
			</div>

			<div class="portlet-body">
				<div class="row">

					<?php $form = ActiveForm::begin(); ?>
					<?php
					
					//echo "<pre>";
					
					$sourceval = "";
					$c = 0;
					foreach($cafdata as $cafalldata)	
					{
						$sourceval[$c] = "Caf ID : ".$cafalldata['caf']['id']." / Project ID : ".$cafalldata['caf']['project_id']." / Project : ".$cafalldata['pro']['project'];

						$c = $c+1;
					}
					
//					$sourcevalarr = explode(",",$sourceval);
					
					?>

					<div class="col-lg-6">
						
					<label class="control-label" for="notification-caf_pro">Project</label>						
						
						<?php
						
						echo AutoComplete::widget([
						'name' => 'Caf',
						'id' => 'caf_pro',						
						'clientOptions' => [
							'source' => $sourceval,
							'autoFill' => true,
							'placeholder' => 'Enter CAF Id / Project Name',
							'minLength' => '1',
							'select' => new JsExpression("function( event, ui ) {
					$('#inoculation-caf_pro').val(ui.item.id);
					}")],
						'options' => [
							'class' => 'form-control',
							'placeholder' => 'Enter CAF Id / Project Name',
						]
					]);
					?>
					
				    <?= Html::activeHiddenInput($model, 'caf_pro') ?>
						
					<?php echo $form->field($model, 'caf_id')->textInput(['type'=>'hidden'])->label(false) ?>
					</div>
					
					
					<div class="col-lg-6"> 
					<?= $form->field($model, 'user_id')->textInput(['type'=>'hidden'])->label(false) ?>
					</div>
					
					<div class="col-lg-12" id="ajaxdivex">

					</div>
					<div class="col-lg-6">
					<label class="control-label" for="notification-caf_id">Comment</label>
					</div>
					<div class="col-lg-12">
					<?= $form->field($model, 'notification_detail')->textarea(['rows' => 6, 'style'=>'width:90% !important;'])->label(false) ?>
					</div>

					<div class="col-lg-6">

					<?= $form->field($model, 'date_created')->textInput(['type'=>'hidden','value'=>date('Y-m-d H:i:s')])->label(false) ?>
					</div>
					<div class="col-lg-12">
					<div class="form-group">
					<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
						</div>
			</div>
			    <?php ActiveForm::end(); ?>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php 
  
$this->registerJs( 
' 
$(document).ready(function () { 
               $("#caf_pro").change(function () {
			   alert("fdffdf");
			   sendFirstCategory(); 
               }); 
           }); 
 
       function sendFirstCategory() { 
           var id = $("#caf_pro").val(); 
           $.ajax({ 
               type: "POST", 
               url: "'.Yii::$app->getUrlManager()->createUrl("notification/ajax").'", 
               data: {id: id}, 
               success: function (test) {
                 $( "#ajaxdivex" ).html(test);
				 var invstid = $( "#invstidin" ).val();
 				 var cafnid = $( "#cafidin" ).val();
				 $( "#notification-user_id" ).val(invstid);
 				 $( "#notification-caf_id" ).val(cafnid);
               },
               error: function (exception) {
               
               }
           }) 
           ; 
       }', View::POS_READY, 'district-ajax'); 
 
 
?> 
