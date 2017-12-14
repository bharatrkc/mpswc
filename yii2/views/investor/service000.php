<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Services';
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
	
	$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
	foreach($service_ids_arr as $val) {
		
		$url = 'javascript:void();';
		if($val['active'] == 'active') {
			$service_id = $val['service_id'];
			$url = Url::to(['investor/service']).'&project_id='.$project_id.'&serviceid='.$val['service_id'];
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

<style>
div.required:after {
    content: " *";
    color: red;
}
.container-fluid{margin:0px;border:0px;}
.row-bordered{border-bottom:1px solid #ccc;}
.col{border-bottom:1px solid #ccc;padding:8px 10px;min-height: 40px;}
.fa-list{font-size:20px;}
 .element-label{
    margin-top: 1px;
    font-weight: 400;
    width: 200px;
    text-align: right;
    vertical-align: top;
}

input, select {
    display: inline-block;
    width: 285px;
    height: auto;
    padding: 3px 6px;
}
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


.control-label {
    margin-top: 1px;
    font-weight: 400;
    width: 200px;
	text-align:right;
    vertical-align: top;
}
.hasDatepicker, .form-control, .form-group .bootstrap-select.btn-group {
    display: inline-block;
    width: 300px; 
	height: auto;
    padding: 3px 6px;
}
.bootstrap-select>.dropdown-toggle.bs-placeholder {

}
.btn { 
    padding: 3px 6px;
}

.has-error .help-block{ 
    padding-left: 210px;
} 
h3 {
    font-size: 15px;
    background-color: #32c5d2;
    padding: 5px;
	color:#fff;
}



.steps { 
  padding: 0;
  overflow: hidden;
}
.steps a {
  color: white;
  text-decoration: none;
}
.steps em {
  display: block;
  font-size: 11px;
  font-weight: normal;
}
.steps li {
  float: left;
  margin-left: 0;
  width: 150px; /* 100 / number of steps */
  height: 80px; /* total height */
  list-style-type: none;
  padding: 5px 5px 5px 30px; /* padding around text, last should include arrow width */
  border-right: 3px solid white; /* width: gap between arrows, color: background of document */
  position: relative;
}
/* remove extra padding on the first object since it doesn't have an arrow to the left */
.steps li:first-child {
  padding-left: 5px;
}
/* white arrow to the left to "erase" background (starting from the 2nd object) */
.steps li:nth-child(n+2)::before {
  position: absolute;
  top:0;
  left:0;
  display: block;
  border-left: 25px solid white; /* width: arrow width, color: background of document */
  border-top: 40px solid transparent; /* width: half height */
  border-bottom: 40px solid transparent; /* width: half height */
  width: 0;
  height: 0;
  content: " ";
}
/* colored arrow to the right */
.steps li::after {
  z-index: 1; /* need to bring this above the next item */
  position: absolute;
  top: 0;
  right: -25px; /* arrow width (negated) */
  display: block;
  border-left: 25px solid #7c8437; /* width: arrow width */
  border-top: 40px solid transparent; /* width: half height */
  border-bottom: 40px solid transparent; /* width: half height */
  width:0;
  height:0;
  content: " ";
}

/* Setup colors (both the background and the arrow) */

/* Completed */
.steps li { background-color: #7C8437; margin-top:10px; }
.steps li::after { border-left-color: #7c8437; }

/* Current */
.steps li.current { background-color: #C36615; }
.steps li.current::after { border-left-color: #C36615; }

/* Following */
.steps li.current ~ li { background-color: #EBEBEB; }
.steps li.current ~ li::after { border-left-color: #EBEBEB; }

/* Hover for completed and current */
.steps li:hover {background-color: #696}
.steps li:hover::after {border-left-color: #696}

.col-lg-12>.form-group>label{width:45%;}
.col-lg-12>.form-group>input{width:45%;}
</style>

<div role="main" class="main">
	<section class="">
			<div class="row">
				<div class="col-md-12">
<ul class="steps steps-5">
<?php
 echo  '<li><a href="'.Url::to(['caf/index', 'projectId' => $investorProjectDetail[0]->project_id]).'" title=""><em>Step 1: CAF</em><span>Consolidated Application Form</span></a></li>';
 $i = 2;
 $flag = 0;
 foreach($investorProjectDetail as $investorproject) {
	$name = ''; 
	if(isset($services[$investorproject->service_id]["short_name"]))
			 $name = $services[$investorproject->service_id]["short_name"];
		if($name == '') {
			$name = $services[$investorproject->service_id]["name"];
	}
	if($investorproject->completed) {
 		echo  '<li><a href="'.Url::to(['investor/service', 'project_id'=>$investorproject->project_id, 'serviceid'=>$investorproject->service_id, 'action'=>'view']).'" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
	}
	else {
		if($flag == 0) {
			echo  '<li><a href="'.Url::to(['investor/service', 'project_id'=>$investorproject->project_id]).'" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
			
			$flag = 1;
		}
		else {			
			echo  '<li><a href="#" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
		}
	}

	$i++;
}
 echo  '<li><a href="/backoffice/index.php?r=investor/upload&project_id=' . $investorProjectDetail[0]->project_id . '" title=""><em>Step '.$i.': Upload Enclosures</em><span></span></a></li>';

?>
  <!-- <li class="current"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li> -->
</ul>

				</div>
			</div>
	</section>
</div>

<div class="container-fluid">
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
			   <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'form' => "form_tab".$new_tab]) ?>
			</div>
		</div>
		
		<?php /* to get button text next or submit */ ?>
		<input type="hidden" name="tabnum" value="Next" id="tabnum" form="form_tab<?= $new_tab?>"/>

		<input type="hidden" name="service_id" id="txt-service_id" value="<?= $service_id?>" form="form_tab<?= $new_tab?>"/>
<!-- 
		<input type="hidden" name="_csrf"  id="txt-csrf"  value="<?=Yii::$app->request->getCsrfToken()?>" form="form_tab<?= $new_tab?>"/> -->

		<input type="hidden" value="<?= $new_tab; ?>" name="current_tab" id="current_tab" />
		<?php ActiveForm::end(); ?>
	</div>
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

?>

<?php 
$json_ang_vals = "";
if(isset($json_val_arr)) {  
	$json_ang_vals = $json_vals; 
}

?> 
<script>
var app = angular.module("myApp", []);
	app.controller("formCtrl", function($scope) {
		
	   <?php echo $json_ang_vals; ?>
});

</script>
<?php

/*
$this->registerJs(
'
var app = angular.module("myApp", []);
	app.controller("formCtrl", function($scope) {
		
		' . $json_ang_vals . '
});
', View::POS_READY, 'my-angulardd'); */
?>

<?php
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
			$('.btn-primary').html('Next');
			$('#tabnum').val('Next');
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
    'backoffice/js/jquery.validate.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    'backoffice/js/additional-methods.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

 
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

 
?> 
 