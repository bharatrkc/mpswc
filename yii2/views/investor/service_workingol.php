<?php 
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'CAF - A Details';
$this->params['breadcrumbs'][] = $this->title;

//----------------------------------------------------

$counter = 0;
$next_service_active = 0;
$service_ids_arr = array();
foreach($investorProjectDetail as $investorproject) {
	$name = '';
	if(isset($services[$investorproject->service_id]["short_name"]))
			 $name = $services[$investorproject->service_id]["short_name"];
		if($name == '') {
			$name = $services[$investorproject->service_id]["name"];
	}

	$active = '';
	if($investorproject->json) {	  
			if($investorproject->completed) {
				$active = 'active'; 
				$next_service_active++;
			}
	}
	if($next_service_active == $counter) {
			$active = 'active'; 
	}

	$service_ids_arr[$investorproject->service_id] = array('service_id' => $investorproject->service_id, 'completed' => $investorproject->completed, 'value' => $investorproject, 'name' => $name, 'active' => $active); 

	$counter++;
}

$services_progress = '';
$service_id = '';
if(count($service_ids_arr)) {
	if(count($investorProjectDetail)) {
		$width = (100/count($investorProjectDetail));
	} 
	
	$caf_id = Yii::$app->getRequest()->getQueryParam('cafid');
	foreach($service_ids_arr as $val) {
		
		$url = 'javascript:void();';
		if($val['active'] == 'active') {
			$service_id = $val['service_id'];
			$url = Url::to(['investor/service']).'&cafid='.$caf_id.'&serviceid='.$val['service_id'];
		} 

		$services_progress .= '<li style="width: ' . $width . '%"  class="' . $val['active'] . '"><a href="' . $url . '">' . $val['name'] . '</a></li>'; 
	}
}

if($serviceid) {
	$service_id = $serviceid;
}

//-----------------------------------------------------

$current_tab = 1;
$new_tab = 1;
if(count($investorProjectDetail_arr)) {
	if(isset($investorProjectDetail_arr[$service_id]->json)) { 

		$current_tab = $investorProjectDetail_arr[$service_id]->current_tab;
		$new_tab = $investorProjectDetail_arr[$service_id]->current_tab+1; 
		$json_val = $investorProjectDetail_arr[$service_id]->json;

		$json_val_arr = json_decode($json_val);
		$json_vals = '';
		$i = 1;
 

		if(count($json_val_arr)) {
			foreach($json_val_arr as $val) {
					$json_vals .= ' $scope.tab' . $i . ' = ' . json_encode($val) . '; ';
					$i++;
			}
		}
	}
}

?>
<script> 
	var app = angular.module('myApp', []);
	app.controller('formCtrl', function($scope) {
		
		<?php if(isset($json_val_arr)) {  
			 echo $json_vals; 
		  } ?>

	});
</script>
<style>
.apply{
    background-image: url('images/apply.png');
    background-position: right;
    background-repeat: no-repeat;
    background-size: 21px;
    padding-right: 25px !important;}

</style>
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"><i style=" font-size:20px;" class="fa fa-list"></i><?= Html::encode($this->title) ?></div>
		<div class="tools"> </div>
	</div>

	<div class="portlet-body" ng-app="myApp" ng-controller="formCtrl">

 	<?php

	$form = ActiveForm::begin([
			'id' => 'form_tab' . $new_tab, 
			'options' => ['class' => 'form-horizontal'],
	]);
	?> 
	
	<ul id="progressbar"><?= $services_progress; ?></ul>

	<?php
  // echo '------service id----'.$service_id.'-----';
		// Load the XML source
		$xml = new DOMDocument;
		try {
			$xml->load('services/' . $service_id . '/fields.xml');
		} 
		catch(Exception $e) {
		  echo 'Message: ' . $e->getMessage(); 
		  echo '<br/>';
		}

		$xsl = new DOMDocument;
		try {
			$xsl->load('services/form.xsl');
		} 
		catch(Exception $e) {
		  echo 'Message: ' . $e->getMessage(); 
		  echo '<br/>';
		}

		$proc = new XSLTProcessor;
		try {
		  $proc->importStyleSheet($xsl); // attach the xsl rules
		  echo $proc->transformToXML($xml);
		} 
		catch(Exception $e) {
		  echo 'Message: ' . $e->getMessage(); 
		}
		?>  
			
		<div class="row" style="border:0px;padding:15px 0px;">
			<div class=" col-md-2 col-md-offset-5">
			   <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'form' => "form_tab".$new_tab]) ?>
			</div>
		</div>
		
		<?php /* to get button text next or submit */ ?>
		<input type="hidden" name="tabnum" value="Submit" id="tabnum" form="form_tab<?= $new_tab?>"/>

		<input type="hidden" name="service_id" id="txt-service_id" value="<?= $service_id?>" form="form_tab<?= $new_tab?>"/>
<!-- 
		<input type="hidden" name="_csrf"  id="txt-csrf"  value="<?=Yii::$app->request->getCsrfToken()?>" form="form_tab<?= $new_tab?>"/> -->

		<input type="hidden" value="<?= $new_tab; ?>" name="current_tab" id="current_tab" />
		<?php ActiveForm::end(); ?>
	</div>
</div>
 
 <?php
 //  echo '-------------------'.$current_tab.'--------------'.$new_tab.'-----------';
 ?>


 
<link rel="stylesheet" type="text/css" href="/backoffice/services/css/style.css">

<?php

$this->registerCssFile("@web/services/css/style.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()], 
], 'css-style-services');
 
$this->registerJsFile(
    '@web/services/js/jq.progress-bar.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
 

$this->registerJs(
"
size_li = $('.nav-tabs li').size();
count=1;
current_tab = $('#current_tab').val()*1;

$('#tab".$new_tab."').showProgress({

  // custom messages
  message: {
    '25': 'You\'re doing great so far!',
    '50': 'You\'re halfway there!',
    '75': 'Look at that, you\'re nearly done already!',
    '100': 'All done! Just click <strong>Submit</strong> to continue!'
  },

  // 'top' or 'bottom'
  position: 'bottom'
  
});

$(document).ready(function() {

	var count = ($('.nav-tabs li').length)*1;
    var current_tab = ($('#current_tab').val())*1;//+1;
	
	$('li.li-tab').addClass('disabled');
	$('li.li-tab').removeClass('active'); 
	$('div.tab-pane').removeClass('active in');  
	

	if(current_tab > count) {
		$('#current_tab').val(1);
		var current_tab = 1;
		$('.btn-primary').css('display', 'none');
		$('li.li-tab').removeClass('disabled');
	    $('div.tab-pane').addClass('active in');  
	
	}
 
	
	for(i=1; i < current_tab; i++) {  
		$('.nav-tabs #li_tab'+i+' a').addClass('apply'); 
	} 

	for(i=1; i <= current_tab; i++){ 
		$('#li_tab'+i).removeClass('disabled'); 
	} 
    $('li#li_tab'+current_tab).addClass('active'); 
	$('div#tab'+current_tab).addClass('active in'); 


	/* tab switch */
	$('.nav-tabs a').click(function(){
		$(this).tab('show');
		var tabli_id = $(this).parent().attr('id');
		var current_switched_tab = (tabli_id.substring(6))*1; 

		
		$('form.form-horizontal').attr('id', 'form_tab'+current_switched_tab);
		$('#txt-csrf').attr('form', 'form_tab'+current_switched_tab);
		$('#txt-service_id').attr('form', 'form_tab'+current_switched_tab);
		$('.btn-primary').attr('form', 'form_tab'+current_switched_tab);
		$('#tabnum').attr('form', 'form_tab'+current_switched_tab);

		$('#current_tab').val(current_switched_tab); 

 

		if(count != current_switched_tab) {
			$('.btn-primary').html('Next >>');
			$('#tabnum').val('Next >>');
		}
		if(count == current_switched_tab) {			
			$('.btn-primary').html('Submit');
			$('#tabnum').val('Submit');
		}

	}); 


	/*button submit or next*/
    if(count != current_tab) {
		$('.btn-primary').html('Next >>');
		$('#tabnum').val('Next >>');
	}


	$('.nav-tabs li').on('click', function(e) {
		  if ($('.nav-tabs li a').hasClass('disabled')) {
			
			 $(\"[data-toggle='popover']\").popover();   
			return false;
		  }
	});
		 
}); 
", View::POS_READY, 'my-button-handler');

?>
<?php

$this->registerJsFile(
    'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    'https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

 /*
$this->registerJs(
'
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#form_tab'.$new_tab.'" ).validate({
  rules: {
    field: {
      required: true,
      max: 23
    }
  }
});
', View::POS_READY, 'inline-err-message-handler');

 */
?> 
 