<?php
use yii\helpers\Html;
use himiklab\colorbox\Colorbox;
use branchonline\lightbox\Lightbox; 

echo Colorbox::widget(['targets' => ['.colorbox' => ['inline' => 'true', 'width' => '90%', 'height' => '90%']], 'coreStyle' => 2]);


$this->title = 'Service List';
$this->params['breadcrumbs'][] = ['label' => 'Service Wizard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    
<!-- breadcrumb -->    
<div class="brdcm_bs">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="brdcm_bs_title text-left">
                        <h2><?= Html::encode($this->title) ?></h2>
                        <div class="h-devider"></div>
                        <!--<p>Big and experienced team</p>-->
                    </div>
                </div>
                <!--<div class="col-md-3">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">List of pesa</li>
                    </ol>
                </div>-->
            </div>
        </div>
</div>
<!-- breadcrumb --> 

<div class="container">
<style>
     .tbl_posa .table > tbody > tr > td {
        vertical-align: middle;
    }
    .cntnt-body{
        border: 10px solid #0000003d;
        background: #fff;
    }
    .listofpre_est .table > thead > tr > th{
        /*background: #5cb85c;
        color: #FFF;
        border: 1px solid #ccc;
        border-bottom: 6px solid #007900;*/
    }
    .listofpre_est .table > tbody > tr > td {
        font-size: 13px;
        font-weight: normal;
        border-color: #ccc;
        vertical-align: middle;
    }
    .listofpre_est .table > tbody > tr > td:nth-child(4) , .listofpre_est .table > tbody > tr > td:nth-child(5) {
        text-align: center;
    }
    .listofpre_est .table > tbody > tr > td > label{
        font-weight: normal;
    }
    .listofpre_est .table > tbody > tr > td > a.clklink{
        padding: 2px 5px;
    }
    </style>
    

<?php

$i = 1;

if(isset($servicelist['Pre Establishment']))
if(count($servicelist['Pre Establishment'])) {

?>

<h3>Pre Establishment:</h3>

                
                
                
<div class="tbl_posa listofpre_est">
<div class=" ">
<table class="table table-striped table-bordered table-condensed" style=" ">
    <thead>
      <tr>
      <th style=" ">S. No. </th>
        <th style=" ">Services</th>
        <th style=" ">Department</th>
        <th style=" ">Approval Details</th>
        <th style=" ">Application Form</th>
        <!-- <th>Application Forms</th> -->
      </tr>
    </thead>
    <tbody>  

<?php



foreach ($servicelist['Pre Establishment'] as $service):	
?>
<tr>
      <th style=" "><?php echo $i++; ?></th>

	<td  style=" "><?php print $service['services'];?></td>
	<td style=" "><?php print $service['department'];?></td>
	<td style=" ">
	<a href="#content_<?= $service['id']?>" class="colorbox clklink">Click for details</a>
	<div style='display:none'>
        <div>
			<div class="cntnt-body" id='content_<?= $service['id']?>' style='background:#fff;'>
                
			  <table id="w0" class="table table-striped table-bordered detail-view">
                  <tbody>
                    <tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>
                    <tr><th>Department</th><td><?= $service['department']?></td></tr>
                    <tr><th>When Approval Required</th><td><?php echo $service['when_approval_required']?></td></tr>
                    <tr><th>Minimum Eligibility</th><td><?php echo  $service['minimum_eligibility']?></td></tr>
                    <tr><th>Act Rule</th><td><?php echo  $service['act_rule']?></td></tr>
                    <tr><th>Validity Of Approval</th><td><?php echo  $service['validity_of_approval']?></td></tr>
                    <tr><th>Procedure For Applying</th><td><?php echo  $service['procedure_for_applying']?></td></tr>
                    <tr><th>Website</th><td><?php echo  $service['website']?></td></tr>
                    <tr><th>Time Limit</th><td><?php echo  $service['time_limit']?></td></tr>
                    <tr><th>Authority Responsible</th><td><?php echo  $service['authority_responsible']?></td></tr>
                    <tr><th>Notified Under Public</th><td><?php echo  $service['notified_under_public']?></td></tr>
                    <tr><th>Any Other Special Condition</th><td><?php echo  $service['any_other_special_condition']?></td></tr>
                    <tr><th>Type Of Industry</th><td><?php echo  $service['type_of_industry']?></td></tr>
                    <tr><th>Industry Status</th><td><?= $service['industry_status']?></td></tr>
                  </tbody>
                </table>

			</div>
        </div>
	</div>
	
	</td>
    <td style=" "><a href="<?= $service['website']?>">Online</a> </td>
	<!-- <td><?php // print $service['website'];?></td> -->
</tr>
<?php
endforeach; 
?>
</tbody>
 </table>
</div>
</div>
<?php } ?>

<?php
if(isset($servicelist['Pre Operational']))
if(count($servicelist['Pre Operational'])) {
?>
<h3>Pre Operational:</h3>
<div class="tbl_posa listofpre_est">
<div class=" ">
<table class="table table-striped table-bordered table-condensed" style=" ">
    <thead>
      <tr>
        <th style=" ">S. No. </th>
        <th style=" ">Services</th>
        <th style=" ">Department</th>
        <th style=" ">Approval Details</th>
        <th style=" ">Application Form</th>
        <!-- <th>Application Forms</th> -->
      </tr>
    </thead>
    <tbody>  
<?php
//echo "<pre>"; print_r($servicelist['Pre Operational']); echo "</pre>";
foreach ($servicelist['Pre Operational'] as $service):
?>
<tr>
  <th style=" "><?php echo $i++; ?></th>
	<td style=" "><?php print $service['services'];?></td>
	<td style=" "><?php print $service['department'];?></td>
	<td style=" "><a href="#content_<?= $service['id']?>" class="colorbox clklink">Click for details</a>
<div style='display:none'>
      <div class="cntnt-body" id='content_<?= $service['id']?>' style='background:#fff;'>
        <table id="w0" class="table table-striped table-bordered detail-view"><tbody>
         
<tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>
<tr><th>Department</th><td><?= $service['department']?></td></tr>
<tr><th>When Approval Required</th><td><?php echo $service['when_approval_required']?></td></tr>
<tr><th>Minimum Eligibility</th><td><?php echo  $service['minimum_eligibility']?></td></tr>
<tr><th>Act Rule</th><td><?php echo  $service['act_rule']?></td></tr>
<tr><th>Validity Of Approval</th><td><?php echo  $service['validity_of_approval']?></td></tr>
<tr><th>Procedure For Applying</th><td><?php echo  $service['procedure_for_applying']?></td></tr>
<tr><th>Website</th><td><?php echo  $service['website']?></td></tr>
<tr><th>Time Limit</th><td><?php echo  $service['time_limit']?></td></tr>
<tr><th>Authority Responsible</th><td><?php echo  $service['authority_responsible']?></td></tr>
<tr><th>Notified Under Public</th><td><?php echo  $service['notified_under_public']?></td></tr>
<tr><th>Any Other Special Condition</th><td><?php echo  $service['any_other_special_condition']?></td></tr>
<tr><th>Type Of Industry</th><td><?php echo  $service['type_of_industry']?></td></tr>
<tr><th>Industry Status</th><td><?= $service['industry_status']?></td></tr></tbody></table>
      </div>
  </div>


  </td>
    <td style=" "><a href="<?= $service['website']?>">Online</a> </td>
	<!-- <td><?php //print $service['website'];?></td> -->
</tr>
<?php
endforeach; 
?>
    </tbody>
  </table>
</div>
</div>
 <?php } ?> 

</div>