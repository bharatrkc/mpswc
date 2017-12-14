<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Tabs;
use yii\helpers\Projectidvs;

use yii\web\View;
 
$this->title = 'Dashboard'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
    <style>
        .m-t-40{
            margin-top: 40px!important;
        }
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
		
	.alertpro
		{
		display:none;
		background-color:rgba(128, 128, 128, 0.37);
		width:100%;
		height:9000px;
		overflow:hidden;
		top:0px;
		left:0px;
		margin:auto;
		padding-top:10%;
		padding-left:0px !important;
		position:fixed;
		z-index:9999;

		}
    	.alertpro .alertin
		{
		margin:auto !important;
		padding:auto !important;
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
    
    
    </style>
	<style>
	.ibox-content ul.grav li
	{
		list-style:none;
		border-bottom: 1px solid #eee;

	}

	ul.grav
	{
	height: 200px;
	overflow-y: scroll;
	}
        
        .animation_b1
        {
            min-height:190px !important;
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
    .widget {
        border-radius: 5px;
        padding: 10px 5px;
        }
        .white{
            color: #FFF;
        }
	</style>

        <style>

#custom_carousel .item {

    color:#000;
    min-height: 145px;
    /*background-color:#eee;
    padding:20px 0;*/
}
#custom_carousel .controls .nav > li > a {
    color: #FFF;
    font-weight: 600;
    padding: 3px 1px;

}
#custom_carousel .controls .nav > li > a:hover , #custom_carousel .controls .nav > li > a:focus{
     background: none;   
    background: rgba(0, 0, 0, 0.30);
}

#custom_carousel .controls{
    overflow-x: auto;
    overflow-y: hidden;
    padding:0;
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background: rgba(0, 0, 0, 0.20);
    border-radius: 4px;
}
#custom_carousel .controls li {
    display: table-cell;
    width: 1%;
    /*max-width:90px*/
}
#custom_carousel .controls li.active a {
    background: #2F4050;
    color: #FFF;
    /*background-color:#eee;
    border-top:3px solid orange;*/
}
#custom_carousel .controls a small {
    overflow:hidden;
    display:block;
    font-size:10px;
    /*margin-top:5px;*/
    font-weight:bold
}   
#custom_carousel .controls .nav > li.active {
    border-left: none;
}          
        </style>            

    <?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
	?>
  <div class="wrapper wrapper-content animated fadeInRight ecommerce">
    

    <div class="ibox-content m-b-sm border-bottom">
            
             <div class="row">
                 <div class="col-lg-12">
                 <div class="ibox">
              <div class="ibox-title" style="border: none;">
                    <h4>Investment Report Card </h4>
               </div>
               <div class="ibox-content" style="padding: 10px 0px;">
                
                <div class="col-lg-3">



                    <div class="widget blue-bg text-center animation_b1" id="animation_box1" data-animation="pulse">
                        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                    <!-- Wrapper for slides -->
                            
                        <div class="carousel-inner">
                        
                            
                            <div class="item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12">                                        
                                            <div class=" ">
                                                <h2 class="m-xs white m-t-40"><i class="fa fa-inr"></i> <?php echo $totvalallnot['sumtotproval']+$totvalall['sumtotcafval']; ?> Cr</h2>
                                                <h4 class="font-bold no-margins white">
                                                    Net worth of Projects in FY 17
                                                </h4>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>            
                            </div> 
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
										<a href="" class="approveclickx" valvx="proj">
                                        <div class="col-xs-12">
                                            <h2 class="white m-t-40"><?php echo $totvalallnot['sumtotproval']; //$wgetcount['investment_cost']-$totvalall['sumtotproval']; ?> Cr</h2>
                                            <h4 class="font-bold no-margins white">Propossed Investment</h4>
                                        </div>
										</a>
                                    </div>
                                </div>            
                            </div> 
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
										<a href="" class="approveclickx" valvx="caf">
                                        <div class="col-xs-12">
											<h2 class="white m-t-40"><?php echo $totvalall['sumtotcafval']; ?> Cr</h2>
                                            <h4 class="font-bold no-margins white">Actual CAF Investment</h4>
                                        </div>
											</a>
                                    </div>
                                </div>           
                            </div> 
                        <!-- End Item -->
                        </div>
                            
                        <div class="controls">
                            <ul class="nav">
                                <li data-target="#custom_carousel" data-slide-to="0" class="active" ><a href="#"><small> Total</small></a></li>
                                <li data-target="#custom_carousel" data-slide-to="1"><a href="#"><small> Propossed</small></a></li>
                                <li data-target="#custom_carousel" data-slide-to="2"><a href="#"><small> CAF</small></a></li>
                            </ul>
                        </div>
                        <!-- End Carousel Inner -->
                        
                    </div>
                    <!-- End Carousel -->

                    </div>
                   
                </div>
                <div class="col-lg-3">
                    
                    <div class="widget yellow-bg p-lg text-center animation_b1" id="animation_box2"  data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs m-t-40"><?php echo $wgetcount['proj_final']; ?></h1>
                            <h4 class="font-bold no-margins">
                                Project applied for FY 17
                            </h4>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    
                    <div class="widget red-bg p-lg text-center animation_b1" id="animation_box3" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs m-t-40"><?php echo $wgetcount['proj_final']; ?></h1>
                            <h4 class="font-bold no-margins">
                                Projects in Land allotted Status
                            </h4>
                            

                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="widget navy-bg p-lg text-center animation_b1" id="animation_box4" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs m-t-40"><?php echo $wgetcount['under_rev']; ?></h1>
                            <h4 class="font-bold no-margins">
                                Projects under review by depts.
                            </h4>
                            

                        </div>
                    </div>
                 </div>
                
               </div>
            </div>
           </div>
        </div>
      </div>

	  <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Gold Standard
                                <small>Dept. Report</small>
                            </h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart1" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Investor Feedback
							
							</h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="lineChart1" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
	  
	  
	  <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Monthly SLA Report
                                <small>Department wise</small>
                            </h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>District Wise
							<small>CAF Approval</small>
							</h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="lineChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
	  
	  <div class="row">
                
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Sector wise Potential Employment 
							<small></small>
							</h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="pieChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
		  <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Grievance
                                <small>Report</small>
                            </h5>
                            <div ibox-tools></div>
                        </div>
						
                        <div class="ibox-content">
							<ul class ="grav">
								
								<?php
								foreach($grievance as $keyg=>$valg)
								{
								?>
								<li>
								<div>
								<span class="badge badge-danger">
								<?php echo $valg['proj_details']['project']; ?>
								</span>
									<br>
								<span class="bg-default">
									<b>
										Service Name : <?php echo $valg['serve_details']['services']; ?>
										
									</b>
									<h5>
										Grievance Title :  <?php echo $valg['grev_details']['grievence_title']; ?>
									</h5>
								</span>
									<p>
										<?php echo $valg['grev_details']['grievence']; ?>
									&nbsp
										<a href=""><span style="font-weight:bold;">reply</span></a>
									</p>
									<span>
									<?php
										if($valg['grev_details']['grievance_status']=='O')
										{
										//echo "open";
										}
																			if($valg['grev_details']['grievance_status']=='F')
										{
										//echo "Forwarded";
										}
																			if($valg['grev_details']['grievance_status']=='C')
										{
										//echo "close";
										}
									?>
									</span>
								</div>
								</li>
								<?php
								}
								
								?>
								
								
							</ul>
                            
                        </div>
                    </div>
                </div>
      </div>
	
      
  <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                
                        <div class="ibox-title" style="border-bottom:2px solid #e7eaec; border-top:none;">
                            <h5>Projects List</h5>
                        </div>
                                <div class="ibox-content" style="border-top:none;">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr>
                                                <td>
                                                <div >
                                                <label   for="product_name">Project ID</label>
                                                </div>
                                                </td>
                                                <td>
                                                 <div >
                                                <label   for="product_name">Project Name</label>
                                                 </div>
                                                </td>
                                                
                                                <td>
                                                  <div >
                                                <label   for="status">Current Status</label>
                                                
                                                </div>
                                                </td>
                                                
                                                 <td>
                                                  <div >
                                                <label   for="status">Project Cost</label>
                                                
                                                </div>
                                                </td>
                                                
                                                <td>
                                                <div >
                                                <label   for="status">Applied Date</label>
                                                </div>
                                                </td>
                                                
                                                

                                                <td>                                
                                                    <label   for="status">View</label>
                                                </td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            
												
											<?php
												//echo "<pre>";
												//print_r($investor_project);
												
												foreach($investor_project as $pkey=>$investdetails)
												{
    											?>
    											<tr>
                                                    <td

                                                    <?php 
                                                        if($investdetails->department_approval == 0)
                                                            {
                                                                echo ' class="btn-dangermine" ';
                                                            }
                                                    ?>
                                                    >
                                                        <a href="index.php?r=project/mdview&projectId=<?php echo $investdetails->id; ?>" 
                                                    <?php 
                                                        if($investdetails->department_approval == 0)
                                                            {
                                                                echo ' style="color:white; font-weight: bold;" ';
                                                            }
                                                            else
                                                            {
                                                                echo ' style="color:gray; font-weight: bold;" ';                  
                                                            }
                                                    ?>
                                                            
                                                        >
                                                            <?php echo Projectidvs::projectidv($investdetails->id,$investdetails->investor_id); ?>
                                                        </a>
                                                    </td>
                                                <td><?php echo $investdetails->project; ?></td>


                                                <td 
													
													<?php 
													if($investdetails->department_approval == 0 && $investdetails->project_finalized == 1)
													{
														$statuspro = "Pending";
													?>
													class="btn-warningmine"
													<?php
													}
													elseif($investdetails->department_approval == 1 && $investdetails->project_finalized == 1)
													{
													$statuspro = "Complete";
													?>
													class="btn-primarymine"
													<?php
													}
                                                    elseif($investdetails->department_approval == 2)
                                                    {
                                                    $statuspro = "Rejected";
                                                    ?>
                                                    class="bg-default"
                                                    <?php
                                                    }
													else
													{
													$statuspro = "Incomplete";
													?>
													class="btn-dangermine"
													<?php
													}
													?>
													
													
												>
												<strong><?php echo $statuspro; ?></strong>
												</td>
                                                <td style="text-align:right;"><?php echo $investdetails->total_investment; ?>  Cr</td>
                                                <td><?php echo date('d M Y',strtotime($investdetails->created)); ?></td>
                                                <td>                                
                                                    
													<?php
												if($investdetails->department_approval == 1)
												{
												?>
                                                <a href="index.php?r=trifac/deptpro&projectId=<?php echo $investdetails->id; ?>"><span class="btn btn-success" style="font-weight:bold;">View Details</span></a>
												<?php
												}
                                                else if($investdetails->department_approval == 0)
                                                {
                                                ?>
                                                <a href="index.php?r=project/mdview&projectId=<?php echo $investdetails->id; ?>"><span class="btn btn-success" style="font-weight:bold;">View Details</span></a>
                                                <?php
                                                }
                                                else if($investdetails->department_approval == 2)
                                                {
                                                ?>
                                                <a href="index.php?r=trifac/deptpro&projectId=<?php echo $investdetails->id; ?>"><span class="btn btn-success" style="font-weight:bold;">View Details</span></a>
                                                <?php
                                                }
												?>
                                                </td>
                                                </tr>
                                                <?php
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

<div class="alertpro" id="alertw">
<div class="alertin">
		<div class="col-lg-4">
			</div>
	
	<div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Project Approval</h5>
                            <div class="ibox-tools">
                                <a class="close-link binded closealert">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <h5>Are you sure you want to approve this project ?</h5>
							     
                                <div class="panel panel-default" style="border:none;">
									<div class="panel-body"  style="padding-left:5px;padding-right:5px;">
										<div class="col-lg-2">
											<a href="" id="confapprv"><button class="btn btn-sm btn-success">Yes</button></a>
										</div>
										<div class="col-lg-offset-2 col-lg-2">
											<a class="close-link binded closealert"><button class="btn btn-sm btn-danger">Cancel</button></a>
										</div>
									</div>
                                </div>
                            
                        </div>
                    </div>
                </div>
	
			<div class="col-lg-5">
			</div>
</div>	
</div>

<div class="alertpro" id="alertwx">
<div class="alertin row">
		<div class="col-lg-3">
			</div>
	
	<div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Sector wise Report</h5>
                            <div class="ibox-tools">
                                <a class="close-link binded closealert">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="piedistx">
                            <div id="toreappend">
                                <canvas id="pieChartx" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
	
			<div class="col-lg-3">
			</div>
</div>	
</div>


<div class="alertpro" id="alertwxin">
<div class="alertin row">
		<div class="col-lg-3">
			</div>
	
	<div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 id="theadsector">Sector Report - </h5>
                            <div class="ibox-tools">
                                <a class="close-link binded closealert">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
						<div class="table-responsive" id="dispdata">

							</div>
                        </div>
                    </div>
                </div>
	
			<div class="col-lg-3">
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

	//echo "<pre>";

	//print_r($distjson);

	$label1 = "";
	$label2 = "";

	foreach($distjson as $key=>$val)
	{
		$label1 = $val.','.$label1;
		$label2 = '"'.$key.'",'.$label2;
	}

	$label1s = "";
	$label2s = "";

	$jsport = "";
		
	foreach($modelsectors as $keys=>$vals)
	{
		if($vals['total_value']=="")
		{
    		$vals['total_value'] = 0;
		}
		
		if($vals['total_value']==NULL)
		{
    		$vals['total_value'] = 0;
		}
		$label1s = $vals['total_value'].','.$label1s;
		$label2s = '"'.$vals['sector'].'",'.$label2s;
		
		$jsport = $jsport.'{
            value: '.$vals['total_value'].',
            color: "'.sprintf('#%06X', mt_rand(0, 0xFFFFFF)).'",
            highlight: "#1ab394",
            label: "'.$vals['sector'].'"
        },';
	}


	$label1sp = "";
	$label2sp = "";

	$jsportp = "";
		
	foreach($modelsectorsnot as $keys=>$vals)
	{
		if($vals['total_investment']=="")
		{
    		$vals['total_investment'] = 0;
		}
		
		if($vals['total_investment']==NULL)
		{
    		$vals['total_investment'] = 0;
		}
		
		$label1sp = $vals['total_investment'].','.$label1sp;
		$label2sp = '"'.$vals['sector'].'",'.$label2sp;
		
		$jsportp = $jsportp.'{
            value: '.$vals['total_investment'].',
            color: "'.sprintf('#%06X', mt_rand(0, 0xFFFFFF)).'",
            highlight: "#1ab394",
            label: "'.$vals['sector'].'"
        },';
	}


//echo "</pre>";

$this->registerJs(
'


$(function () {

    var lineData = {
        labels: ["Dept. 1", "Dept. 2", "Dept. 3", "Dept. 4", "Dept. 5", "Dept. 6", "Dept. 7"],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(245, 182, 189,0.5)",
                strokeColor: "rgba(245, 182, 189,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [15, 50, 78, 22, 36, 39, 50]
            },
            {
                label: "Example dataset",
                fillColor: "rgba(255, 110, 126,0.5)",
                strokeColor: "rgba(255, 110, 126,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: [43, 58, 31, 16, 63, 19, 72]
            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("lineChart1").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(lineData, lineOptions);

    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ctx = document.getElementById("barChart1").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

});


$(function () {

    var lineData = {
        labels: ['.$label2.'],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(245, 182, 189,0.5)",
                strokeColor: "rgba(245, 182, 189,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: ['.$label1.']
            }
            
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(lineData, lineOptions);

    var barData = {
        labels: ["IGRS", "AKVN", "F&D", "PCB", "CI&E", "LABOUR", "ENERGY"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(202,67,67,0.5)",
                strokeColor: "rgba(202,67,67,0.8)",
                highlightFill: "rgba(202,67,67,0.75)",
                highlightStroke: "rgba(202,67,67,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

});

var doughnutData = [
        {
            value: 30000,
            color: "#a3e1d4",
            highlight: "#1ab394",
            label: "Tourism Hospitality"
        },
        {
            value: 50000,
            color: "#dedede",
            highlight: "#1ab394",
            label: "Electronics"
        },
        {
            value: 10000,
            color: "#b5b8cf",
            highlight: "#1ab394",
            label: "Manufacturing"
        },
		{
            value: 4500,
            color: "#b5b000",
            highlight: "#1ab000",
            label: "IT / ITES"
        },
    ];

    var doughnutOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 0, // This is 0 for Pie charts
        animationSteps: 100,
        animationEasing: "easeInCubic",
        animateRotate: true,
        animateScale: false,
        responsive: true,
    };


    var ctx = document.getElementById("pieChart").getContext("2d");
    var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);



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
                $("#animation_box1").addClass("widget blue-bg p-lg text-center animation_b1");
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
                $("#animation_box2").addClass("widget yellow-bg p-lg text-center animation_b1");
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
                $("#animation_box3").addClass("widget red-bg p-lg text-center animation_b1");
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
                $("#animation_box4").addClass("widget navy-bg p-lg text-center animation_b1");
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
                $("#animation_box5").addClass("widget blue-bg p-lg text-center animation_b1");
            });


 $.fn.MessageBox = function(vale,evnt) {
 evnt.preventDefault();
 var vfg = vale;
 $("#confapprv").removeAttr("href").attr("href", "index.php?r=trifac/proapprove&projectId="+vfg);
 $("#alertw").fadeIn();
 return false;
    };

 $(".closealert").on("click", function (evnt) {
  evnt.preventDefault();
  $(".alertpro").fadeOut();
  return false;
 });
 
 $(".approveclickx").on("click", function (evnt) {
 evnt.preventDefault();
 
 $("#pieChartx").remove(); // this is my <canvas> element
 $("#toreappend").append(\'<canvas id="pieChartx" height="140"><canvas>\');

 $("#alertwx").fadeIn();
 var widthx = $("#piedistx").width();

// $("#piedistx").css("height","180px");
// $("#pieChartx").css("height","140px");
// $("#piedistx").css("width","100%");
// $("#pieChartx").css("width","90%"); 

var valvxchk = $(this).attr("valvx");

	if(valvxchk=="caf")
	{
	var doughnutDatax = [
			'.
		$jsport
		.'
		];
	}
	else
	{
	var doughnutDatax = [
			'.
		$jsportp
		.'
		];
	}

    var doughnutOptionsx = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 0, // This is 0 for Pie charts
        animationSteps: 100,
        animateRotate: true,
        animateScale: false,
        responsive: true,
   };


    var ctxs = document.getElementById("pieChartx").getContext("2d");
    var myNewChartx = new Chart(ctxs).Doughnut(doughnutDatax, doughnutOptionsx);
	
	$("#pieChartx").click(function(evt){
						    evt.preventDefault();
                            var activePoints = myNewChartx.getSegmentsAtEvent(evt);

							 $("#theadsector").html("CAF Sector Report - "+activePoints[0].label);
							 
	    					 $(".alertpro").hide();

                        
						if(valvxchk == "caf")
						{
						$.post("'.Url::toRoute("/trifac/sectorwisepol").'", {
							sector: activePoints[0].label,_csrf: yii.getCsrfToken() } )
							.done(function( data ) {
									$("#dispdata").html("");
									$("#dispdata").html(data);
								});
						}
						else
						{
						$.post("'.Url::toRoute("/trifac/sectorwisepolpro").'", {
							sector: activePoints[0].label,_csrf: yii.getCsrfToken() } )
							.done(function( data ) {
 									$("#dispdata").html("");
									$("#dispdata").html(data);
								});						
						}
						
						$("#alertwxin").show();
						myNewChartx.destroy();
						myNewChartx.clear();
						
						$("#pieChartx").remove(); // this is my <canvas> element
						$("#toreappend").append(\'<canvas id="pieChartx" height="140"><canvas>\');

						
						});

	return false;
 });
 
		

//custom_carousel JS
$(document).ready(function(ev){
    $("#custom_carousel").on("slide.bs.carousel", function (evt) {
      $("#custom_carousel .controls li.active").removeClass("active");
      $("#custom_carousel .controls li:eq("+$(evt.relatedTarget).index()+")").addClass("active");
    })
});
', View::POS_READY, 'my-button-handler');

?>
