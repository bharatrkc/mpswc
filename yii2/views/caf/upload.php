<?php 
// require 'E:/wamp64/www/investmp/yii2/vendor/autoload.php';

use vlaim\fileupload\FileUpload;

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\UploadedFile;
use skeeks\widget\simpleajaxuploader\Widget;


$this->title = 'Enclosures'; 
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


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


<div role="main" class="main">
	<section class="">
			<div class="row">
				<div class="col-md-12">
					<?php 
					
						$photo = UploadedFile::getInstance($model, 'files'); 
						$uploader = new FileUpload(FileUpload::S_LOCAL); ?>

					
<ul class="steps steps-5">
<?php

if(isset($investorProjectDetail[0])) {

 echo  '<li><a href="'.Url::to(['caf/index', 'projectId' => $investorProjectDetail[0]->project_id, 'type' => $industry_status]).'"  title="Consolidated Application Form"><em>Step 1: CAF</em><span></span></a></li>';
 $i = 2;
 $flag = 0;
 foreach($investorProjectDetail as $investorproject) {
	$name = ''; 
	if(isset($services[$investorproject->service_id]["short_name"]))
	         $name = substr($services[$investorproject->service_id]["short_name"], 0, 80);
		if($name == '') {
			$name = substr($services[$investorproject->service_id]["name"], 0, 80);
	}
	if($investorproject->completed) {
 		echo  '<li><a href="'.Url::to(['caf/services', 'project_id' => $investorproject->project_id, 'serviceid' => $investorproject->service_id, 'action' => 'view']).'" title="'.$name.'"><em>Step '.$i.':</em><span></span></a></li>';
	}
	else {
		if($flag == 0) {
			echo  '<li><a href="'.Url::to(['caf/services', 'project_id' => $investorproject->project_id]).'" title="'.$name.'"><em>Step '.$i.':</em><span> </span></a></li>';	
			$flag = 1;
		}
		else {			
			echo  '<li><a href="#" title="'.$name.'"><em>Step '.$i.':</em><span></span></a></li>';
		}
	}

	$i++;
}
 echo  '<li class="current"><a href="'.Url::to(['caf/upload', 'project_id' => $investorProjectDetail[0]->project_id]).'" title="Upload Enclosures"><em>Step '.$i.':</em><span></span></a></li>';

}
?>
  <!-- <li class="current"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li> -->

</ul>
 

				</div>
			</div>
	</section>
 </div>

<?php

foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}

?>
<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-investor"> 
	<div class="portlet box green"> 
		<div class="portlet-body">
	<table class="table table-striped table-bordered">
    <thead><tr><th width="5%">#</th><th width="30%">Document</th><th width="65%">Upload Files</th></tr></thead>
	<tbody> 
	 <?php  
	 $i=1;
	 foreach($documents as $key=>$document): ?>
		<tr>
		<td><?=$i;?></td>
		<td><?= $document;?></td>
		<td> 

		<?= $form->field($model, 'files['.$key.']', [
			'inputOptions' => [
				'required' => 'required', 
			]])->fileInput(['accept' => 'image/*, pdf/*'])->label(''); ?>
		
 
		</td>
		</tr> 

	 <?php $i++; 
		endforeach; ?>

	</tbody>
	 </table>
 
	<p>&nbsp;<br></p>
	<div class="row">
		<div class=" col-md-2 col-md-offset-5">
		   <?= Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right', 'name' => 'upload-button']) ?> 
		</div>
	</div>
	<?php ActiveForm::end(); ?>

</div>
</div>
</div>

</div>