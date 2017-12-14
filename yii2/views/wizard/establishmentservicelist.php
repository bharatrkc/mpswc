<?php
use yii\helpers\Html;
use himiklab\colorbox\Colorbox;
use branchonline\lightbox\Lightbox; 

echo Colorbox::widget(['targets' => ['.colorbox' => ['inline' => 'true', 'width' => '90%', 'height' => '90%']], 'coreStyle' => 2]);

$this->title = 'List of State Approvals / Permissions you may require to start a business / industry in Madhya Pradesh';
$this->params['breadcrumbs'][] = ['label' => 'Service Wizard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
	<h3><?= Html::encode($this->title) ?></h2>

<?php 
if(isset($servicelist['Pre Establishment']))
if(count($servicelist['Pre Establishment'])) {
?>
	<h3>Pre Establishment:</h3>
	<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>S No.</th>
        <th>Service</th>
        <th>Department</th>
        <!-- <th>Approval Detaiils</th> -->
        <!-- <th>Application Forms</th> -->
      </tr>
    </thead>
    <tbody>  
<?php
$i= 1;
foreach ($servicelist['Pre Establishment'] as $service):	
?>
<tr>
	<td><?php print $i;?></td>
	<td><?php print $service['services'];?></td>
	<td><?php print $service['department'];?></td>
	<!-- <td>
	<a href="#content_<?= $service['id']?>" class="colorbox">Click for details</a>
	
	<div style='display:none'>
			<div id='content_<?= $service['id']?>' style='padding:10px; background:#fff;'>
			  <table id="w0" class="table table-striped table-bordered detail-view"><tbody>
				<tr><th colspan="2" style="text-align:center"><?= $service['services']?></th></tr>
				<tr><th>Department</th><td><?= $service['department']?></td></tr>
				<tr><th>When Approval Required</th><td><?php  echo $service['when_approval_required']?></td></tr>
				<tr><th>Minimum Eligibility</th><td><?php  echo  $service['minimum_eligibility']?></td></tr>
				<tr><th>Act Rule</th><td><?php  echo  $service['act_rule']?></td></tr>
				<tr><th>Validity Of Approval</th><td><?php  echo  $service['validity_of_approval']?></td></tr>
				<tr><th>Procedure For Applying</th><td><?php  echo  $service['procedure_for_applying']?></td></tr>
				<tr><th>Website</th><td><?php  echo  $service['website']?></td></tr>
				<tr><th>Time Limit</th><td><?php  echo  $service['time_limit']?></td></tr>
				<tr><th>Authority Responsible</th><td><?php  echo  $service['authority_responsible']?></td></tr>
				<tr><th>Notified Under Public</th><td><?php  echo  $service['notified_under_public']?></td></tr>
				<tr><th>Any Other Special Condition</th><td><?php  echo  $service['any_other_special_condition']?></td></tr>
				<tr><th>Type Of Industry</th><td><?php  echo  $service['type_of_industry']?></td></tr>
				<tr><th>Industry Status</th><td><?= $service['industry_status']?></td></tr></tbody>
			</table>
			</div>
	</div>
	</td>
	<td><?php   print $service['website'];?></td> -->
</tr>
<?php
$i++;
endforeach; 
?>
</tbody>
 </table>
<?php } ?> 

</div>