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


use app\models\MmUnit;
use app\models\MmLineOfActivitySector;
use app\models\MmLineOfActivity;

?>


<div role="main" class="main">
	<section class="">
			<div class="row">
				<div class="col-md-12"> 
<ul class="steps steps-5">
   <?php /*
  if($disabled) {	  
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		$serviceid = Yii::$app->getRequest()->getQueryParam('serviceid');
	 echo '<li><a href="/backoffice/index.php?r=investor/services&project_id='.$project_id.'" title=""><em>Step 2: Services</em><span> </span></a></li>';
  }
  else {
	  echo '<li><a href="#" title=""><em>Step 2: Services</em><span> </span></a></li>';
  }
  */ 
if(isset($investorProjectDetail[0])) {
	 echo  '<li class="current"><a href="'.Url::to(['caf/index', 'projectId' => $investorProjectDetail[0]->project_id, 'type' => $industry_status]).'" title="Consolidated Application Form"><em>Step 1: CAF</em><span></span></a></li>';

	  $i = 2;
	 foreach($investorProjectDetail as $investorproject) {
		$name = ''; 
		if(isset($services[$investorproject->service_id]["short_name"]))
	         $name = substr($services[$investorproject->service_id]["short_name"], 0, 80);
		if($name == '') {
			$name = substr($services[$investorproject->service_id]["name"], 0, 80);
		}

		if($model->id) {
			echo  '<li><a href="'.Url::to(['caf/services', 'project_id' => $investorproject->project_id, 'serviceid'=>$investorproject->service_id, 'type' => $industry_status]).'"  title="'.$name.'"><em>Step '.$i.':</em><span></span></a></li>';
		}
		else {
			echo  '<li><a href="#" title="'.$name.'"><em>Step '.$i.':</em><span></span></a></li>';
		}
		 
		$i++;
	}
	 echo  '<li><a href="'.Url::to(['caf/upload', 'project_id' => $investorProjectDetail[0]->project_id, 'type' => $industry_status]).'" title="Upload Enclosures"><em>Step '.$i.':</em><span></span></a></li>';
  }
?>
  <!-- <li class="current"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li> -->
</ul>
 
				</div>
			</div>
	</section>
 </div>