<?php
use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
 
$this->title = 'Services'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<style>
.container-fluid{margin:0px;border:0px;}
.row-bordered{border-bottom:1px solid #ccc;}
.col{border-bottom:1px solid #ccc;padding:8px 10px;min-height: 60px;}
.fa-list{font-size:20px;}
</style>
<style>
.table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: auto;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
      overflow: auto;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}

.form-investor .panel-default>.panel-heading {
    color: #FFF;
    background-color: #2f4050;
    border-color: #ddd;
    padding: 2px 5px;
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
	padding-top:3%;
	padding-left:0px !important;
	position:fixed;
	z-index:9999;

	}
	.alertpro .alertin
	{
	margin:auto !important;
	padding:auto !important;
	}


</style>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $this->title; ?></h2>		
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> 
	</div> 
</div>


<div class="wrapper wrapper-content animated fadeInRight"> 
	<div class="form-investor white-bg" style="background-color:#fff;"> 

		<div style="width:740px;margin:0px auto;">
			<?php  $form = ActiveForm::begin([ 'options' => ['class' => 'form-horizontal'],]); ?> 
		</div>


		  		<?php
				  $headerx =  '
				<div class="container-fluid">
				  <div class="row">

				  <div class="panel-heading"><h4> <i class="fa fa-list"></i>&nbsp;  List of Pre-Establishment Services to apply:</h4></div>
				   <div class="ibox-content">
				   <div class="table-responsive">
				   <table class="table table-bordered table-striped table-hover">
					  <thead>
						<tr>
						  <th class=" ">#</th><th class=" ">Service Name</th><th class=" " style="text-align:center;"><a href="return:false;" valve="select" id="select-all-prestab">Select All</a></th>
						</tr>
					  </thead>
					  <tbody class="prestab">';

					$upperser = 0;
					if(isset($investorproject_detail)) {
						if(count($investorproject_detail)) {
							$i = 1;
							$flag = 0;
							foreach ($investorproject_detail as $service):

						 
								
							if($service->type == 'pre-establishment' && $_GET['type']!='preoperational') {

							$flag = 1;
							if($flag == 1 && $i ==1) { $upperser = 1; echo $headerx; }

									$service_id = $service->service_id;	

									$disabled = '';
									$checked = '';
									$img = '';
									if($service->status==2) {
										$disabled = 'disabled';
										$checked = 'checked'; 
									}
									if($service->completed) { 
										$img = '<img src="images/apply.png" style="width:20px;position: absolute;"/>';
									}
									?>
								   <tr>
									  <td class=" "><?php print $i; ?></td>
									  <td class="" style="width: 60%;"><?php if(isset($services[$service_id]['name'])) { print $services[$service_id]['name']; } ?></td>
									  <td class=" " style="text-align:center;">
										<input type="checkbox" class="service" name="services[]" value="<?= $service_id; ?>" <?= $disabled ?> <?= $checked ?>/>&nbsp;&nbsp;<?= $img?></td>
									</tr> 
							 <?php
								$i++;
							 }
							$flag = 0;
							endforeach; 
						}
					}
					if($upperser==1)
					{
						?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> 
						<?php


					}

					?>

	 
<?php
	if(isset($investorproject_detail)) {
		if(count($investorproject_detail)) { 
			
			$header = '<div class="container-fluid">
				  <div class="row">

						
						<div class="panel-heading"><h4> <i class="fa fa-list"></i>&nbsp; List of Pre-Operational Services to apply:</h4></div>	
					<div class="ibox-content">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">

							  <thead>
								<tr>
								  <th class=" ">#</th><th class=" ">Service Name</th><th class=" " style="text-align:center;"><a href="return:false;" valve="select" id="select-all-preoper">Select All</a></th>
								</tr>
							  </thead>
							  <tbody  class="preoper">';
			?>
	
	<?php 
		$i = 1;
		$flag = 0;

		foreach ($investorproject_detail as $service): 
				
			if($service->type == 'pre-operational' && $_GET['type']!='prestablishment') {
				
				$flag = 1;
				if($flag == 1 && $i ==1) { echo $header; }
				
						//echo '<pre>'; print_r($service); exit;
							$service_id = $service->service_id;	

				$disabled = '';
				$checked = '';
				$img = '';
				if($service->status==2) {
					$disabled = 'disabled';
					$checked = 'checked'; 
				}
				if($service->completed) { 
					$img = '<img src="images/apply.png" style="width:20px;position: absolute;"/>';
				}
				?>
			     <tr>
				  <td class=" "><?php print $i; ?></td>
				  <td class=" " style="width: 60%;"><?php if(isset($services[$service_id]['name'])) { print  wordwrap($services[$service_id]['name'],100," \n"); } ?></td>
				  <td class=" " style="text-align:center;">
					<input type="checkbox" name="services[]" class="services2" value="<?= $service_id; ?>" <?= $disabled ?> <?= $checked ?>/>&nbsp;&nbsp;<?= $img?></td>
				</tr>
				<?php
				$i++;
			}
			$flag = 0;
			endforeach; 

			 if($i > 1) {
	?>

	</tbody>

        </table>



        </div>
        </div>
  </div>

</div>
 <?php 
			 }
		}
	}
	?>
<div class="container-fluid">
	<div class="row">
		<div class="ibox-content" style="border: none !important">
		<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">

				<tfoot>
				<tr>
				<td colspan="3" style="text-align: center;">
					<?= Html::submitButton('Apply', ['class' => 'btn btn-primary']) ?>
				</td>
				</tr>
				</tfoot>
		</table>
		</div>
		</div>
			
		</div>
	</div> 
	<?php ActiveForm::end(); ?>
 
 
</div>
</div>

	<!-- 			The other service driven part				 -->

<?php

/*
		echo "<pre>";
		print_r($services_all);
		echo "</pre>";
		exit();
*/

?>

<div class="wrapper wrapper-content animated fadeInRight"> 
	<div class="form-investor white-bg" style="background-color:#fff;"> 

		<div style="width:740px;margin:0px auto;">

		</div>

		
					<?php
					$xheader = '
		<div class="container-fluid">
			<div class="row">
			<div class="panel-heading"><h4> <i class="fa fa-list"></i>&nbsp;  Other Pre-Establishment Services :</h4></div>
				<div class="ibox-content">
				   <div class="table-responsive">
				   <table class="table table-bordered table-striped table-hover">

					  <thead>
						<tr>
						  <th class=" ">#</th><th class=" ">Service Name</th><th class=" " style="text-align:center;"></th>
						</tr>
					  </thead>
					<tbody class="prestab">';

				  $upperserx = 0;
					if(isset($services_all)) {
						if(count($services_all)) {
							$i = 1;
							foreach ($services_all as $service_all1): 


							if($service_all1['industry_status'] == 'Pre Establishment' && $_GET['type']!='preoperational') {

							$flag = 1;
							if($flag == 1 && $i ==1) { $upperserx = 1; echo $xheader; }

									$service_id = $service_all1['id'];
									?>
								   <tr>
										<td class=" "><?php print $i; ?></td>
										<td class=" " style="width: 60%;"><?php if(isset($service_all1['services'])) { print $service_all1['services']; } ?></td>
										<td class=" " style="text-align:center;">
										<button class="servdetail btn btn-sm btn-info"  data-toggle="modal" data-target="#data__55" data-valids="<?php echo $service_all1['id']; ?>">View Details</button>
										</td>
									</tr> 
							 <?php
								$i++;
							 }
 							$flag = 0;
							endforeach; 
						}
					}
					
					if($upperserx == 1)
					{
						?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div> 
						<?php

					}

					?>
					
	 
<?php
	if(isset($services_all)) {
		if(count($services_all)) { 
			
			$header = '<div class="container-fluid">
				  <div class="row">

						
						<div class="panel-heading"><h4> <i class="fa fa-list"></i>&nbsp; Other Pre-Operational Services :</h4></div>
					<div class="ibox-content">	
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">

							  <thead>
								<tr>
								  <th class=" ">#</th><th class=" ">Service Name</th><th class=" " style="text-align:center;"></th>
								</tr>
							  </thead>
							  <tbody  class="preoper">';
			?>
	
	<?php 
		$i = 1;
		$flag = 0;

		foreach ($services_all as $services_all1): 
				
			if($services_all1['industry_status'] == 'Pre Operational' && $_GET['type']!='prestablishment') {

				$flag = 1;
				if($flag == 1 && $i ==1) { echo $header; }			
					//echo '<pre>'; print_r($service); exit;
					$service_id = $services_all1['id'];
				?>
			     <tr>
				  <td class=" "><?php print $i; ?></td>
				  <td class=" " style="width: 60%;"><?php if(isset($services_all1['services'])) { print  wordwrap($services_all1['services'],100," \n"); } ?></td>
				  <td class=" " style="text-align:center;">
					<button class="servdetail  btn btn-sm btn-info" data-toggle="modal" data-target="#data__55" data-valids="<?php echo $services_all1['id']; ?>">View Details</button>
				  </td>
				</tr>
				<?php
				$i++;
			}
			$flag = 0;
			endforeach; 

			 if($i > 1) {
	?>

	</tbody>
        </table>
        </div>
        </div>
  </div>

</div>
 <?php 
			 }
		}
	}
	?>

	

 
 
</div>
</div>

    <!--  modal start-->                                      
    <div class="modal fade prestlistdetail in" id="data__55" role="dialog" tabindex="-1">
    
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"> Service Details - </h4>
        </div>
        <div class="modal-body text-left p-0">
            
			  <div class="table-responsive" id="dispdata">

              </div>
        </div>
      </div>
    </div>
    
    </div>     

   <!--  modal end-->

<!---

<div class="alertpro" id="alertwxin">
<div class="alertin row">
		<div class="col-lg-3">
			</div>
	
	<div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 id="theadsector">Service Details - </h5>
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

		-->


<?php
$this->registerJs(
'
$(document).ready(function() {
            $(".dataTables-example").dataTable({
                responsive: true,
                "paging": false,
                "ordering": false,
		        "info":     false,
                "sDom": \'<"top"i>rt<"top"lp><"clear">\',
                "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
 
        });

	$(".servdetail").click(function(evt){
			evt.preventDefault();
			var sId = $(this).attr("data-valids");
			$.post("'.Url::toRoute("/caf/servicepol").'", {
							id: sId,_csrf: yii.getCsrfToken() } )
							.done(function( data ) {
									$("#dispdata").html("");
									$("#dispdata").html(data);
								});

			$("#alertwxin").show();
	});
	
	$(".closealert").on("click", function () {
	$(".alertpro").hide();
	return false;
	});


	$("#select-all-prestab").click(function() {

		    if($(this).attr("valve") == "select") {
			$(".service").prop( "checked", true );
			$(".service").iCheck("check");
			$(".service").iCheck("update");
			$(this).text("Reset");
			$(this).removeAttr("valve");
			$(this).attr("valve","reject");
		} else {
			$(".service").prop( "checked", false );
			$(".service").iCheck("uncheck");
			$(".service").iCheck("update");
			$(this).removeAttr("valve");
			$(this).attr("valve","select");
			$(this).text("Select All");
		}
	});

	$("#select-all-preoper").click(function() {

			if($(this).attr("valve") == "select") {
			$(".services2").prop( "checked", true );
			$(".services2").iCheck("check");
			$(".services2").iCheck("update");
			$(this).text("Reset");
			$(this).removeAttr("valve");
			$(this).attr("valve","reject");
		} else {
			$(".services2").prop( "checked", false );
			$(".services2").iCheck("uncheck");
			$(".services2").iCheck("update");
			$(this).removeAttr("valve");
			$(this).attr("valve","select");
			$(this).text("Select All");
		}
	});

', View::POS_READY, 'my-button-handler');

?>