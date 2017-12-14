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
if(isset($servicelist['Pre Operational']))
if(count($servicelist['Pre Operational'])) {
?>
<h3>Pre Operational:</h3>
<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>S No.</th>
        <th>Service</th>
        <th>Department</th>
        <!-- <th>Approval Detaiils</th>
        <th>Application Forms</th>  -->
      </tr>
    </thead>
    <tbody>  
<?php
$i = 1;
foreach ($servicelist['Pre Operational'] as $service):
?>
<tr>
	<td><?php print $i;?></td>
	<td><?php print $service['services'];?></td>
	<td><?php print $service['department'];?></td>
	<!-- <td><a href="#">Click for details</a></td>
	<td><?php  print $service['website'];?></td> -->
</tr>
<?php
$i++;
endforeach; 
?>
    </tbody>
  </table>
 <?php } ?> 

</div>