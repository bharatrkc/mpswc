<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

use yii\web\View;
 
$this->title = 'Dashboard'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
    <style>
    .msgnthe
    {
        border-top:none !important;
    
        background-color:white !important;
    }
    .problue
    {
        background-color: #507fd4; 
        color:white;
    }
    .proorg
    {
        background-color: #d4a550; 
        color:white;
    }
    .progreen
    {
        background-color: #50d48b; 
        color:white;
    }
    .progray
    {
        background-color: #cacecc; 
        color:white;
    }
    
    @media screen and (min-width: 600px) {
    .vwport
    {
        width:100%; 
        font-size: 2vw;
    }
    }
    
    @media screen and (max-width: 599px) and (min-width: 100px) {
    .vwport
    {
        width:100%; 
        font-size: 3vw;
    }
    }
	
	.btn-warningmine
	{
		color:white;
	    background-color: #f8ac59;
	}
	
	.btn-primarymine
	{
		color:white;
	    background-color: #1ab394;
	}
	
	.btn-dangermine
	{
		color:white;
	    background-color: #ed5565;
	}
		
    
    
    </style>

  <div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">

<?php

if(count($investor_project)) {


//echo "<pre>";

//print_r($investor_project);

//exit();

//echo "ghfghfghfhh";

		foreach ($investor_project as $project){
		// echo "<pre>";

		// print_r($project);
		
		// echo "</pre>";

//		exit();

			if(isset($project->id)) {
			?>
				
					<?php $proid = $project->id; ?>
					<?php $proname = $project->project; ?> 
					<?php $sectorname = $project->sector; ?>
					<?php $uupdate = $project->updated; ?> 
					<?php $updateby = $project->updated_by; ?> 
					<?php $ucreate = $project->created; ?> 
					<?php $ucreateby = $project->created_by; ?> 
					<?php $investorname = $project->investor_name; ?>  
					 
				
			<?php
			}
		}
	}
?>


	<?php
		$i = 0;
		$count_comp = 0;
		$count_draft = 0;
		$dartft = '';
		$compstst = '';
	if(isset($investorproject_detail)) {
		if(count($investorproject_detail)) {
			$i = 0;

			$count_draft = 0;
			$count_comp = 0;

			foreach ($investorproject_detail as $service){
				$i = $i+1;

				//echo "<pre>";
				//print_r($service);
				//echo "</pre>";
				$service_id = $service->service_id;

				$disabled = '';
				$checked = '';
				$img = '';
				if($service->status) {
					$disabled = 'disabled';
					$checked = 'checked';
				 if(($service->status==2) && ($service->completed==''))
					{
						$count_draft = $count_draft + 1;
					}
				}

				if($service->completed) {
					$count_comp = $count_comp + 1;
				}
				?>
				
									

				<?php
						}
					}
				}
				?>




        <div class="row">
                <div class="col-lg-12">
                   <div class="ibox" style="border: none;">
                    <div class="ibox-title" style="border: none;">
                    <h3><?php echo $proname; ?></h3>
                    </div>
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                           <span class="badge" style="background-color:#23c6c8; float:right;"><h4><?php echo $proid; ?></h4></span>
                                               <h4> 
												Project ID
                                               </h4>
                                       </div> 
                                        <ul class="list-group">
                                           
                                            <li class="list-group-item ">
                                                <span class="badge badge-info">Bhopal</span>
                                                District Name
                                            </li>
                                        
                                            <li class="list-group-item">
                                                <span class="badge badge-primary"><?php echo date('d M Y H:i:s',strtotime($ucreate)); ?></span>
                                                Date Created 
                                            </li>
                                            <li class="list-group-item ">
                                                <span class="badge badge-info"><?php echo date('d M Y H:i:s',strtotime($uupdate)); ?></span>
                                                Last Update 
                                            </li>
                                        
                                            <li class="list-group-item">
                                                <span class="badge badge-primary"><?php echo $investorname; ?></span>
                                                Investor Name
                                            </li>
                                            <li class="list-group-item ">
                                                <span class="badge badge-info"><?php echo $ucreateby; ?></span>
                                                User ID
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                        <h4>Notification</h4>
                         </div>
                            <ul class="sortable-list connectList agile-list ui-sortable list-group" id="todo">
                                <?php
								
								foreach($modelcafvn['noti'] as $key=>$val1)
								{
									foreach($modelcafvn['noti'][$key] as $val)
									{
								?>
								
								<li class="list-group-item msgnthe" id="task1">
					<?php echo $val['notification_detail']; ?>
                                    <div class="agile-detail" >
                                        <i class="fa fa-clock-o"></i>	<?php echo date('d M Y',strtotime($val['date_created'])); ?>
                                    </div>
                                </li>
	                                <?php
									}
								}
							?>
								
								
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
    </div>
</div>

    
    <div class="ibox-content m-b-sm border-bottom">
            
             <div class="row">
                 <div class="col-lg-12">
                 <div class="ibox">
              <div class="ibox-title" style="border: none;">
                    <h4>Total Services : <?php echo $i; ?> </h4>
               </div>
               <div class="ibox-content">
                <div class="col-lg-1">
                
                </div>
                <div class="col-lg-2">
                    <div class="widget gray-bg p-lg text-center" id="animation_box1" data-animation="pulse">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs"><?php echo $i-($count_draft+$count_comp); ?></h1>
                            <h3 class="font-bold no-margins">
                                Incomplete
                            </h3>
                            
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-2">
                    
                    <div class="widget yellow-bg p-lg text-center" id="animation_box2" data-animation="pulse">
                        <div class="m-b-md">
                            <i class="fa fa-clock-o fa-4x"></i>
                            <h1 class="m-xs"><?php echo $count_draft; ?></h1>
                            <h3 class="font-bold no-margins">
                                Pending
                            </h3>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2">
                    
                    <div class="widget red-bg p-lg text-center" id="animation_box3" data-animation="pulse">
                        <div class="m-b-md">
                            <i class="fa fa-send fa-4x"></i>
                            <h1 class="m-xs"><?php echo $count_comp; ?></h1>
                            <h3 class="font-bold no-margins">
                                Forwarded
                            </h3>
                            

                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2">
                    <div class="widget navy-bg p-lg text-center" id="animation_box4" data-animation="pulse">
                        <div class="m-b-md">
                            <i class="fa fa-check-square fa-4x"></i>
                            <h1 class="m-xs">0</h1>
                            <h3 class="font-bold no-margins">
                                Approved
                            </h3>
                            

                        </div>
                    </div>
                 </div>
                
                
                
                
                
                
                <div class="col-lg-2">
                    
                    <div class="widget blue-bg p-lg text-center" id="animation_box5" data-animation="pulse">
                        <div class="m-b-md">
                            <i class="fa fa-thumbs-down fa-4x"></i>
                            <h1 class="m-xs">0</h1>
                            <h3 class="font-bold no-margins">
                                Rejected
                            </h3>
                            

                        </div>
                    </div>
                </div>
               </div>
            </div>
           </div>
        </div>
      </div>
      
  <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                
                        <div class="ibox-title" style="border-bottom:2px solid #e7eaec; border-top:none;">
                            <h5>Application List</h5>
                        </div>
                                <div class="ibox-content" style="border-top:none;">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <td>
                                                <div>
                                                <label for="product_name">ID</label>
                                                </div>
                                                </td>
													
												<td>
												<div>
                                                <label for="status">SLA Status</label>
                                                </div>
                                                </td>
													
                                                <td style="width:20%;">
                                                 <div>
                                                <label for="product_name">Application Name</label>
                                                 </div>
                                                </td>
                                               
                                                <td>
                                                <div>
                                                <label for="price">Dept. Name</label>
                                                </div>
                                                </td>
                                                <td>
												<div>
                                                <label for="status">Applied Date</label>
                                                </div>
                                                </td>
												
													<!--
												<td>
												<div>
                                                <label class="control-label" for="status">SLA Duration</label>
                                                </div>
                                                </td>
													-->
												
													
                                                <td>
													
                                                  <div>
                                                <label for="status">Current Status</label>
                                                
                                                </div>
                                                </td>
                                                <td>                                
                                                    <label for="status">View</label>
                                                </td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            

						<?php
				if(isset($investorproject_detail)) {
				if(count($investorproject_detail)) {
				$i = 0;

				$count_draft = 0;
				$count_comp = 0;

				foreach ($investorproject_detail as $service){
				$i = $i+1;

				// echo "<pre>";
				//print_r($service);
				//echo "</pre>";
				$service_id = $service->service_id;

				$disabled = '';
				$checked = '';
				$img = '';
				if($service->status) {
					$disabled = 'disabled';
					$checked = 'checked';
				 if(($service->status==2) && ($service->completed==''))
					{
						$count_draft = $count_draft + 1;
						
						$dartft = "yes";

					}
				else
					{
						$dartft = "no";
					}

				}

				if($service->completed) {
					$compstst = "yes";
					$count_comp = $count_comp + 1;
				}
				else
				{
					$compstst = "no";
					}
				?>
				
				<tr>
                                                <td><?php echo $service_id = $service->service_id; ?></td>
					<?php 
					
												$date1=date_create(date('Y-m-d',strtotime($service->created)));
												$date_nq = $date1;
												$date2=date_create(date('Y-m-d'));
												$diff=date_diff($date1,$date2);
												$d_diff = $diff->format("%R%a");
												//$d_diff_exceed = $d_diff - $services[$service_id]['sla_duration'];
												$nintypq=(90*($services[$service_id]['sla_duration']))/100;
												$nintypq = floor($nintypq);
												date_add($date_nq,date_interval_create_from_date_string($nintypq." days"));
												$nintypq_sla = date_format($date_nq,"Y-m-d");
												
												?>
												
												<td 
												<?php


													if(($services[$service_id]['sla_duration'])>=$d_diff)
													{
														if(($d_diff>=$nintypq))
														{
															echo "class ='btn-warningmine' ";
														}
														else
														{
															echo "class ='btn-primarymine' ";
														}
													}
					
													if($nintypq>$d_diff)
													{
													echo "class ='btn-primarymine' ";
													}
					
													if($services[$service_id]['sla_duration']<$d_diff)
													{
													echo "class ='btn-dangermine' ";
													}

													?>
													>
													
													<b>SLA(days) : </b>
													
													<?php echo $services[$service_id]['sla_duration']; ?>
													&nbsp;&nbsp;
													<br>
													<?php echo $d_diff." days passed"; ?>
												</td>
					
					
					
                                                <td  style="width:20%;"><?php echo $services[$service_id]['name']; ?></td>
                                               
                                                <td><?php echo $services[$service_id]['department']; ?></td>
                                                <td><?php echo date('d M Y',strtotime($service->created)); ?></td>
												
												
                                                <td class="btn-success"><strong><?php if($dartft=="yes"){ echo "Draft"; } elseif($dartft=="no" && $compstst=="no"){ echo "Pending"; } if($compstst=="yes" && $dartft=="no"){ echo "Complete"; } elseif(empty($dartft) && !empty($compstst)){ echo "Unknown"; } ?></strong></td>
                                                

                                               <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                             </tr>					

				<?php
						}
					}
				}
				?>

					     
                                            
                                            
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </div>

                <?php


 
$this->registerCssFile(
    '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css',
    [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()], 
], 'css-style-services');


$this->registerJsFile(
    '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);


 
$this->registerJs(
' 
$("#animation_box1").mouseenter(function(){
                var animation = $(this).attr("data-animation");
                var clasn = $(this).attr("class");
                $("#animation_box1").removeAttr("class").attr("class", "");
                var clasm = clasn+" "+animation;
                $("#animation_box1").addClass("animated");
                $("#animation_box1").addClass(clasm);
                return false;
            });
$("#animation_box1").mouseleave(function(){
                $("#animation_box1").removeAttr("class").attr("class", "");
                $("#animation_box1").addClass("widget gray-bg p-lg text-center");
            });
            
            $("#animation_box2").mouseenter(function(){
                var animation = $(this).attr("data-animation");
                var clasn = $(this).attr("class");
                $("#animation_box2").removeAttr("class").attr("class", "");
                var clasm = clasn+" "+animation;
                $("#animation_box2").addClass("animated");
                $("#animation_box2").addClass(clasm);
                return false;
            });
$("#animation_box2").mouseleave(function(){
                $("#animation_box2").removeAttr("class").attr("class", "");
                $("#animation_box2").addClass("widget yellow-bg p-lg text-center");
            });
            
            $("#animation_box3").mouseenter(function(){
                var animation = $(this).attr("data-animation");
                var clasn = $(this).attr("class");
                $("#animation_box3").removeAttr("class").attr("class", "");
                var clasm = clasn+" "+animation;
                $("#animation_box3").addClass("animated");
                $("#animation_box3").addClass(clasm);
                return false;
            });
            
$("#animation_box3").mouseleave(function(){
                $("#animation_box3").removeAttr("class").attr("class", "");
                $("#animation_box3").addClass("widget red-bg p-lg text-center");
            });
            
            $("#animation_box4").mouseenter(function(){
                var animation = $(this).attr("data-animation");
                var clasn = $(this).attr("class");
                $("#animation_box4").removeAttr("class").attr("class", "");
                var clasm = clasn+" "+animation;
                $("#animation_box4").addClass("animated");
                $("#animation_box4").addClass(clasm);
                return false;
            });
            
$("#animation_box4").mouseleave(function(){
                $("#animation_box4").removeAttr("class").attr("class", "");
                $("#animation_box4").addClass("widget navy-bg p-lg text-center");
            });
            
            $("#animation_box5").mouseenter(function(){
                var animation = $(this).attr("data-animation");
                var clasn = $(this).attr("class");
                $("#animation_box5").removeAttr("class").attr("class", "");
                var clasm = clasn+" "+animation;
                $("#animation_box5").addClass("animated");
                $("#animation_box5").addClass(clasm);
                return false;
            });
            
$("#animation_box5").mouseleave(function(){
                $("#animation_box5").removeAttr("class").attr("class", "");
                $("#animation_box5").addClass("widget blue-bg p-lg text-center");
            });

 $("#start-new-business").on("click", function () {
 			$.confirm({
					title: "Do You Have Land?",
					content: "Its you must have land before proceeding to project approvals",
					 icon: "fa fa-question-circle",
					 animation: "scale",
					 closeAnimation: "scale",
                     opacity: 0.5,
                     buttons: {
                                "confirm": {
                                    text: "Yes, Proceed",
                                    btnClass: "btn-blue",
                                    action: function () {
                                        $.confirm({
                                            title: "This maybe critical",
                                            content: "You have to fill the land details too.",
                                            icon: "fa fa-warning",
                                            animation: "scale",
                                            closeAnimation: "zoom",
                                            buttons: {
                                                confirm: {
                                                    text: "Yes, sure!",
                                                    btnClass: "btn-orange",
                                                    action: function () { 
														window.location.href = "index.php?r=project/add"
                                                    }
                                                },
                                                NO: function () {
                                                    $.alert("you clicked on <strong>cancel</strong>");
                                                }
                                            }
                                        });
                                    }
                                },
                                No: function () {
                                    $.alert("Please apply for land from AKVN land");
                                }, 
                            }
				});

		});
', View::POS_READY, 'my-button-handler');

?>
