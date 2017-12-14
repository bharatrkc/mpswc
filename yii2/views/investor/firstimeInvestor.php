<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->context->layout = 'fistimeInvestor';
if($any_proj_approved) {
	$this->context->layout = 'investorLayout';
}

$this->title = 'Welcome to MP Invest !'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<style>
.stats .col-lg-3 {
    width: 20%;
}

</style>
<?php
if(count(Yii::$app->session->getAllFlashes())) {
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
}

?>
<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption"><i style=" font-size:20px;" class="fa fa-list"></i><?= Html::encode($this->title) ?></div>
		<div class="tools"> </div>
	</div>

	<div class="portlet-body">
 
 
	<h3>&nbsp;&nbsp;<br>
	<a href="<?= Url::to(['project/add']) ?>" class="btn btn-primary">Existing Project</a>&nbsp;&nbsp;&nbsp;
	<a href="<?= Url::to(['project/add']) ?>" class="btn btn-primary">New Project</a></h3>
&nbsp;<br>


<?php 

if(isset($investor_projects)) {
?>
<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th width="25%">Project</th>
        <th width="30%">Project Detils</th>
        <th width="20%">Sector</th> 
        <th width="25%">Status</th>  
      </tr>
    </thead>
	<tbody> 
<?php

if(count($investor_projects)) {
foreach ($investor_projects as $project): ?>
 
	<tr>
		<td><?php print $project->project;?></td>
		<td><?php print $project->project_details;?></td> 
		<td><?php print $project->sector;?></td>  
		<td align="center"><?= ($project->department_approval ? '<a href="' . Url::to(['wizard/prestablish', 'id' => $project->id]) . '">Pre Establishment Service Wizard</a>' : 'Departments Approval Pending');?></td>
   </tr>

<?php
endforeach; 
}
else {

	echo '<tr><td colspan="6" align="center" style="padding:20px;">No Projects submitted for approval department</td></tr>';
}
?>
 
	</tbody>
	 </table>

<?php } ?>
 
 




	</div>
</div>
