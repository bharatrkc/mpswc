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
        display: inline-block;
        min-width: 105px;
    }
    #cboxOverlay {
        background: #464646;
        opacity: 0.8;
        filter: alpha(opacity = 80);
    }
    #cboxLoadedContent {
        background: #0000;
        padding: 0px;
    }
    .cntnt-body{
        border: 10px solid rgba(0, 0, 0, 0.49);
        background: #fff;
        padding: 10px;
    }
    
    .prestlistdetail .modal-content {
        border: 10px solid rgba(0, 0, 0, .2);
        }
.prestlistdetail .modal-header .close {
    margin-top: -2px;
    background: #FF7200;
    width: 25px;
    height: 25px;
    text-align: center;
    border-radius: 50%;
    color: #fff;
    position: absolute;
    right: 12px;
    opacity: 1;
    }
.prestlistdetail .modal-header {
    padding: 15px;
    background: #5cb85c;
    color: #FFF;
    border-bottom: 6px solid #007900;
    text-align: left;
}
    .prestlistdetail .modal-title{
        color: #fff;
        text-align: left;
    }
    /*.cntnt-body .table{
        background: url(../../../../themes/mpinvestnew/images/banner/table_bg2.png);
        background-size: cover;
    }*/
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
      <td style=" "><?php echo $i++; ?></td>

	<td  style=" "><?php print $service['services'];?></td>
	<td style=" "><?php print $service['department'];?></td>
	<td style=" ">
	<!--<a href="#content_<?= $service['id']?>" class="colorbox clklink">Click for details</a>-->
        
            <a class="clklink" data-toggle="modal" data-target="#content_<?= $service['id']?>">Click for details</a>
        
        
<!-- Modal -->
  <div class="modal fade prestlistdetail"  id='content_<?= $service['id']?>' role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?= $service['services']?></h4>
        </div>
        <div class="modal-body text-left p-0">
            
			  <table id="w0" class="table table-striped table-bordered table-condensed detail-view m-0">
                  <tbody>
                    <!--<tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>-->
                    <tr><th class="col-sm-6">Department</th><td class="col-sm-6"><?= $service['department']?></td></tr>
                    <tr><th class="col-sm-6">When Approval Required</th><td class="col-sm-6"><?php echo $service['when_approval_required']?></td></tr>
                    <tr><th class="col-sm-6">Minimum Eligibility</th><td class="col-sm-6"><?php echo  $service['minimum_eligibility']?></td></tr>
                    <tr><th class="col-sm-6">Act Rule</th><td class="col-sm-6"><?php echo  $service['act_rule']?></td></tr>
                    <tr><th class="col-sm-6">Validity Of Approval</th><td class="col-sm-6"><?php echo  $service['validity_of_approval']?></td></tr>
                    <tr><th class="col-sm-6">Procedure For Applying</th><td class="col-sm-6"><?php echo  $service['procedure_for_applying']?></td></tr>
                    <tr><th class="col-sm-6">Website</th><td class="col-sm-6"><?php echo  $service['website']?></td></tr>
                    <tr><th class="col-sm-6">Time Limit</th><td class="col-sm-6"><?php echo  $service['time_limit']?></td></tr>
                    <tr><th class="col-sm-6">Authority Responsible</th><td class="col-sm-6"><?php echo  $service['authority_responsible']?></td></tr>
                    <tr><th class="col-sm-6">Notified Under Public</th><td class="col-sm-6"><?php echo  $service['notified_under_public']?></td></tr>
                    <tr><th class="col-sm-6">Any Other Special Condition</th><td class="col-sm-6"><?php echo  $service['any_other_special_condition']?></td></tr>
                    <tr><th class="col-sm-6">Type Of Industry</th><td class="col-sm-6"><?php echo  $service['type_of_industry']?></td></tr>
                    <tr><th class="col-sm-6">Industry Status</th><td class="col-sm-6"><?= $service['industry_status']?></td></tr>
                  </tbody>
                </table>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->     
 
        
        
        
	<!--<div style='display:none'>
        <div>
			<div class="cntnt-body" id='content_<?= $service['id']?>'>
                
			  <table id="w0" class="table table-striped table-bordered table-condensed detail-view">
                  <tbody>
                    <tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>
                    <tr><th class="col-sm-6">Department</th><td class="col-sm-6"><?= $service['department']?></td></tr>
                    <tr><th class="col-sm-6">When Approval Required</th><td class="col-sm-6"><?php echo $service['when_approval_required']?></td></tr>
                    <tr><th class="col-sm-6">Minimum Eligibility</th><td class="col-sm-6"><?php echo  $service['minimum_eligibility']?></td></tr>
                    <tr><th class="col-sm-6">Act Rule</th><td class="col-sm-6"><?php echo  $service['act_rule']?></td></tr>
                    <tr><th class="col-sm-6">Validity Of Approval</th><td class="col-sm-6"><?php echo  $service['validity_of_approval']?></td></tr>
                    <tr><th class="col-sm-6">Procedure For Applying</th><td class="col-sm-6"><?php echo  $service['procedure_for_applying']?></td></tr>
                    <tr><th class="col-sm-6">Website</th><td class="col-sm-6"><?php echo  $service['website']?></td></tr>
                    <tr><th class="col-sm-6">Time Limit</th><td class="col-sm-6"><?php echo  $service['time_limit']?></td></tr>
                    <tr><th class="col-sm-6">Authority Responsible</th><td class="col-sm-6"><?php echo  $service['authority_responsible']?></td></tr>
                    <tr><th class="col-sm-6">Notified Under Public</th><td class="col-sm-6"><?php echo  $service['notified_under_public']?></td></tr>
                    <tr><th class="col-sm-6">Any Other Special Condition</th><td class="col-sm-6"><?php echo  $service['any_other_special_condition']?></td></tr>
                    <tr><th class="col-sm-6">Type Of Industry</th><td class="col-sm-6"><?php echo  $service['type_of_industry']?></td></tr>
                    <tr><th class="col-sm-6">Industry Status</th><td class="col-sm-6"><?= $service['industry_status']?></td></tr>
                  </tbody>
                </table>

			</div>
        </div>
	</div>-->
	
	</td>
    <td style=" "><a href="<?= $service['website']?>" target="_blank">Online</a> </td>
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
  <td style=" "><?php echo $i++; ?></td>
	<td style=" "><?php print $service['services'];?></td>
	<td style=" "><?php print $service['department'];?></td>
	<td style=" "><!--<a href="#content_<?= $service['id']?>" class="colorbox clklink">Click for details</a>-->
        
        <a class="clklink" data-toggle="modal" data-target="#content_<?= $service['id']?>">Click for details</a>
        
        
<!-- Modal -->
  <div class="modal fade prestlistdetail"  id='content_<?= $service['id']?>' role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?= $service['services']?></h4>
        </div>
        <div class="modal-body text-left p-0">
            
            <table id="w0" class="table table-striped table-bordered table-condensed detail-view m-0">
                <tbody>
                    <!--<tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>-->
                    <tr><th class="col-sm-6">Department</th><td class="col-sm-6"><?= $service['department']?></td></tr>
                    <tr><th class="col-sm-6">When Approval Required</th><td class="col-sm-6"><?php echo $service['when_approval_required']?></td></tr>
                    <tr><th class="col-sm-6">Minimum Eligibility</th><td class="col-sm-6"><?php echo  $service['minimum_eligibility']?></td></tr>
                    <tr><th class="col-sm-6">Act Rule</th><td class="col-sm-6"><?php echo  $service['act_rule']?></td></tr>
                    <tr><th class="col-sm-6">Validity Of Approval</th><td class="col-sm-6"><?php echo  $service['validity_of_approval']?></td></tr>
                    <tr><th class="col-sm-6">Procedure For Applying</th><td class="col-sm-6"><?php echo  $service['procedure_for_applying']?></td></tr>
                    <tr><th class="col-sm-6">Website</th><td class="col-sm-6"><?php echo  $service['website']?></td></tr>
                    <tr><th class="col-sm-6">Time Limit</th><td class="col-sm-6"><?php echo  $service['time_limit']?></td></tr>
                    <tr><th class="col-sm-6">Authority Responsible</th><td class="col-sm-6"><?php echo  $service['authority_responsible']?></td></tr>
                    <tr><th class="col-sm-6">Notified Under Public</th><td class="col-sm-6"><?php echo  $service['notified_under_public']?></td></tr>
                    <tr><th class="col-sm-6">Any Other Special Condition</th><td class="col-sm-6"><?php echo  $service['any_other_special_condition']?></td></tr>
                    <tr><th class="col-sm-6">Type Of Industry</th><td class="col-sm-6"><?php echo  $service['type_of_industry']?></td></tr>
                    <tr><th class="col-sm-6">Industry Status</th><td class="col-sm-6"><?= $service['industry_status']?></td></tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->     
        
        
 <!--       
<div style='display:none'>
      <div class="cntnt-body" id='content_<?= $service['id']?>'>
        <table id="w0" class="table table-striped table-bordered table-condensed detail-view"><tbody>
         
<tr><th colspan="2" style="text-align:center;font-size:18px"><?= $service['services']?></th></tr>
<tr><th class="col-sm-6">Department</th><td class="col-sm-6"><?= $service['department']?></td></tr>
<tr><th class="col-sm-6">When Approval Required</th><td class="col-sm-6"><?php echo $service['when_approval_required']?></td></tr>
<tr><th class="col-sm-6">Minimum Eligibility</th><td class="col-sm-6"><?php echo  $service['minimum_eligibility']?></td></tr>
<tr><th class="col-sm-6">Act Rule</th><td class="col-sm-6"><?php echo  $service['act_rule']?></td></tr>
<tr><th class="col-sm-6">Validity Of Approval</th><td class="col-sm-6"><?php echo  $service['validity_of_approval']?></td></tr>
<tr><th class="col-sm-6">Procedure For Applying</th><td class="col-sm-6"><?php echo  $service['procedure_for_applying']?></td></tr>
<tr><th class="col-sm-6">Website</th><td class="col-sm-6"><?php echo  $service['website']?></td></tr>
<tr><th class="col-sm-6">Time Limit</th><td class="col-sm-6"><?php echo  $service['time_limit']?></td></tr>
<tr><th class="col-sm-6">Authority Responsible</th><td class="col-sm-6"><?php echo  $service['authority_responsible']?></td></tr>
<tr><th class="col-sm-6">Notified Under Public</th><td class="col-sm-6"><?php echo  $service['notified_under_public']?></td></tr>
<tr><th class="col-sm-6">Any Other Special Condition</th><td class="col-sm-6"><?php echo  $service['any_other_special_condition']?></td></tr>
<tr><th class="col-sm-6">Type Of Industry</th><td class="col-sm-6"><?php echo  $service['type_of_industry']?></td></tr>
<tr><th class="col-sm-6">Industry Status</th><td class="col-sm-6"><?= $service['industry_status']?></td></tr></tbody></table>
      </div>
</div>
-->

  </td>
    <td style=" "><a href="<?= $service['website']?>" target="_blank">Online</a> </td>
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