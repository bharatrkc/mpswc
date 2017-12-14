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
.problue {
	background-color: #507fd4; 
	color:white;
}
.prored{
	background-color: #f56161; 
	color:white;
}
.proorg{
	background-color: #d4a550; 
	color:white;
}
.progreen{
	background-color: #2e8b57; 
	color:white;min-height: 130px;
}
.progray{
	background-color: #cacecc; 
	color:white;
}

.formwidth
{
	max-width:80% !important;
}

.product-box{
	transition: all .6s;
}
.product-box:hover{
    border: 1px solid transparent;
    -webkit-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.3);
    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.3);
    transform: translateY(-10px);
}

	
@media screen and (min-width: 600px) {
	.vwport{
        width:100%; 
        font-size: 2vw;
    }
}

@media screen and (max-width: 599px) and (min-width: 100px) {
    .vwport {
        width:100%; 
        font-size: 3vw;
    }
}
.product-desc {
    padding: 10px 5px;
    position: relative;
}

.product-box, .ecommerce .ibox {
    padding: 0;
    box-shadow: inset 0 0 0 #ccc, 0 0px 0 0 #ccc, 0px 2px 6px #ccc;
    border-radius: 5px;
    border-radius: 0;
    background: #fff;
    box-shadow: 0px 5px 10px rgba(136, 136, 136, 0.2);
}
.wrapper-content {
    padding: 10px;
}
.ibox-content {
    padding: 15px 15px 5px 15px;
    position:relative;
}

.bxxico{
    position: absolute;
    right: 10px;
    top: 10px;
    color: darkorange;
    font-size: 54px;
    opacity: 0.3;
}


/**new css 16-10-2017**/
.dbmainbtn1{
	background: #2f4050;
    border-radius: 0px;
    color: #FFF !important;
    /*border: 1px solid darkorange;*/
    border-radius:2px;
    font-size:16px;    margin-bottom: 10px !important;
}
.dbmainbtn2{
	background: #2f4050;
    border-radius: 0px;
    color: #FFF !important;
    /*border: 1px solid darkorange;*/
    border-radius:2px;
font-size:16px;    margin-bottom: 10px !important;
}
button.dim{margin-bottom: 10px !important;}
.dbmainbtn1:hover{
	background: #ffeac9;background: #cccccc;
    color: #000000 !important;
}
.dbmainbtn2:hover{
	background: #ffeac9;background: #cccccc;
    color: #000000 !important;
}

.product-imitation {
    padding: 10px;
    font-weight: normal;
}
.btn-primary {
    background-color: #ffb236;
    border-color: #ffb236;
    color: #FFFFFF;
}
</style> 

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
?>

  <div class="wrapper-content ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">

                    <div class="" style="border: none;">
                        <div class="col-lg-6">
                            
                            <!--<button class="btn dim btn-outline vwport dbmainbtn1" type="button"><i class="fa fa-chain"></i>
                            Create new Project
                            </button>-->
                                
                            <button type="button" class="btn dim btn-outline vwport dbmainbtn1" data-toggle="modal" data-target="#new_project_pop">Create new Project</button>
                              <!-- Modal -->
                              <div class="modal fade" id="new_project_pop" role="dialog" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">
                                        <i class="fa fa-info-circle text-info" aria-hidden="true"></i>&nbsp;&nbsp; Land Information</h3>
                                    </div>
                                    <div class="modal-body">
                                        
                                      <h5>Are you in possession of land in the State of MP on which you intend to establish
and start business operations? </h5>
                                        <h5>Please click <span class="text-info" >'OK'</span> to procced</h5>
                                        
                                    </div>
                                    <div class="modal-footer">
                                      <button onclick="window.location.href = 'index.php?r=project/add'" type="button" class="btn btn-info pull-left">OK</button>
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#new_project_pop2">No</button>
                                        
                                        <!-- Modal -->
                                      <div class="modal fade" id="new_project_pop2" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                            <div class="modal-header" style="border: ;">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body text-center p-10">
                                                 <h5><i class="fa fa-info-circle text-info" aria-hidden="true"></i>&nbsp;&nbsp; <a href="http://www.invest.mp.gov.in/advancelandbookingakvn.action?" target="_blank" >Please click here to book Land via AKVN</a> </h5>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- end Modal -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end Modal -->
                                
                        </div>
                        <div class="col-lg-6">
                            <a href="<?= Url::to(['project/existing']) ?>">
                            <button class="btn  dim btn-outline vwport dbmainbtn2" type="button"><i class="fa fa-edit"></i>
                            Renew an existing Project
                            </button>
                            </a>
                        </div>
                    </div>
        </div>
    </div>






<div class=" ">
	
	<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5 style="color:#FE8C00;"><b>Total Projects / CAF</b></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" style="color:#FE8C00;"><b> <?php echo count($investor_projects); ?> </b></h1>
                                <div class="stat-percent font-bold text-success"> </div>
                                <small>Total</small>
                                <i class="fa fa-list-ol bxxico" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"></span>
                                <h5 style="color:#ff0000;"><b>Total Incomplete Services</b></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" style="color:#ff0000;"><b><?=$incomplete;?></b></h1> 
                                <small>Incomplete</small>
                                <i class="fa fa-ban bxxico" aria-hidden="true" style="color:#ff0000;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right"></span>
                                <h5 style="color:#00aaff;"><b>Total Services Pending</b></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" style="color: #00aaff;"><b>0</b></h1>
                                <small>Pending with you</small>
                                <i class="fa fa-clock-o bxxico" aria-hidden="true" style="color:#00aafe;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"> 
                                <h5 style="color: #006400;"><b>Total Services Approved</b></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" style="color: #006400;"><b>0</b></h1> 
                                <small>Approved</small>
                                <i class="fa fa-check bxxico" aria-hidden="true" style="color:#006400;"></i>
                            </div>
                        </div>
            </div>
        </div>

</div>
 

<!-- 

  <div class="ibox-content m-b-sm border-bottom">
				
				
				<div class="row">
                    <div class="col-sm-12"> <h2>Projects</h2></div>
				</div>				
				<div class="row">
                    <div class="col-sm-3">
                        <div >
                            <label class="control-label" for="product_name">Project Name</label>
                            <input type="text" id="product_name" name="product_name" value="" placeholder="Project Name" class="form-control formwidth">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div >
                            <label class="control-label" for="price">Department</label>
                            <input type="text" id="price" name="price" value="" placeholder="Department" class="form-control formwidth">
                        </div>
                    </div>
	  
                    <div class="col-sm-3">
                        <div >
                            <label class="control-label" for="quantity">Service</label>
                            <input type="text" id="quantity" name="quantity" value="" placeholder="Service" class="form-control formwidth">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div >
                            <label class="control-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control formwidth">
                                <option value="">All</option>
                                <option value="1">Pending</option>
                                <option value="0">Approved</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div> -->



			<div class="row">
		<?php
		if(isset($investor_projects)) { 
			if(count($investor_projects)) {
				$x = 0;
				foreach ($investor_projects as $project) {  
					$x = $x + 1;
					if($project->type == 'new') {  
						$status = ($project->department_approval ? 'Approved' : 'Pending');
					}
					else {
						$status = 'Approved';	
					}
		?>
		<div class="col-md-3">
			<div class="ibox">
				<div class="product-box">

					<a href="<?php
							if($status == 'Approved') { 
							echo 'index.php?r=investor/projectnew&projectId=' . $project->id; } 
							else { 
								echo 'javascript:void(0);'; }
							?>">

						<div class="product-imitation <?php
							if($status == 'Approved') { echo ' progreen'; } 
							elseif($status == 'Pending') { echo ' proorg'; }
							?>" > 

							
						<?php 

						if($status == 'Approved') { 
							
						if(isset($project_status[$project->id])) {
							?>
							Services Status&nbsp;<hr style="margin-top: 8px;margin-bottom: 9px;border: 0;border-top: 1px solid #eee;">
							<div class="row">
								<div class="col-xs-6 text-left">Applied </div>
								<div class="col-xs-1 text-left"><i class="fa fa-send fa-1x"></i></div>
								<div class="col-xs-4"><?php 
								if(isset($project_status[$project->id]['applied'])) { 
									echo count($project_status[$project->id]['applied']); }
								else { echo '0'; } ?></div>  
							</div>
							<div class="row">
							    <div class="col-xs-6 text-left">Pending </div>
								<div class="col-xs-1 text-left"><i class="fa fa-clock-o fa-1x"></i></div>
								<div class="col-xs-4"><?php if(isset($project_status[$project->id]['incomplete'])) { echo count($project_status[$project->id]['incomplete']); } else { echo '0'; } ?></div>
							</div>
							<div class="row">
							    <div class="col-xs-6 text-left">Approved </div>
								<div class="col-xs-1 text-left"><i class="fa fa-thumbs-up fa-1x"></i></div>
								<div class="col-xs-4">0</div>
							</div>
							<div class="row">
							    <div class="col-xs-6 text-left">Rejected </div>
								<div class="col-sm-1 text-left"><i class="fa fa-thumbs-down fa-1x"></i></div>
								<div class="col-xs-4">0</div>
							</div>

							<?php
							}
							else { ?>
Services Status&nbsp;<hr style="margin-top: 8px;margin-bottom: 9px;border: 0;border-top: 1px solid #eee;">
								<div class="row">
									<div class="col-sm-12">Project has been approved but no servies has been availed yet.</div>
								</div>
							<?php }
							}
							else {?>
								<div class="row">
									<div class="col-sm-12">Project is under review by department</div>
								</div>
							<?php } ?>

						</div>
                   </a>
				  <div class="product-desc">
					<small class="text-muted">Project</small>
					<?php echo Projectidvs::projectidv($project->id,$project->investor_id); ?> : <?php echo $project->project; ?>
					<div class="small m-t-xs"><?php echo $project->project_details; ?></div>
					<div class="m-t text-righ">
					<?php if($status == 'Approved') { ?>
							<a href="<?php echo 'index.php?r=investor/projectnew&projectId='.$project->id; ?>" class="btn btn-xs btn-outline btn-primary" style="max-width:90% !important;">Project Dashboard <i class="fa fa-long-arrow-right"></i> </a>
					<?php } 
					else { ?>
						<a href="javascript:void(0);" class="btn btn-xs btn-outline btn-primary" style="max-width:90% !important; font-size:10px; padding-left:-5px;">Department's Approval Pending</a> 

					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if($x%4 == 0) { ?>
		</div>
		<div class="row"> 
	<?php
			}
		}
	}
}
?>
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


$this->registerJsFile(
    'backoffice/inspinia/js-included/sweetalert2/sweetalert2.all.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    'backoffice/inspinia/js-included/sweetalert2/core.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);


$this->registerJs('
	$.noConflict();

	
 $("#start-new-business").on("click", function () {
		swal({
				  title: "Do You Have Land?",
				  type: "info",
				  html: "Land Information is required to proceed further. Please click \'OK\' to continue. <br/><br/>To apply for Land, please <a href=\'http://www.invest.mp.gov.in/advancelandbookingakvn.action?\' target=\'_Blank\'>click here</a>",
				  showCloseButton: true,
				  showCancelButton: true,
				  focusConfirm: false,
				  confirmButtonText: "OK",
				  confirmButtonAriaLabel: "Thumbs up, great!",
				  cancelButtonText: "No",
				  cancelButtonAriaLabel: "Thumbs down",
		}).then(function () {
			window.location.href = "index.php?r=project/add";
		})
});

	
	$("#new_project_pop2").children().on("click", function (e) {
		$(".modal").fadeOut();
	});

	$("#start-new-business434343").on("click", function () {
 			$.confirm({
					title: "Do You Have Land?",
					content: "1) Land Information is required to proceed further. Please click \'OK\' to continue. <br/><br/>To apply for Land, please <a href=\'http://www.invest.mp.gov.in/advancelandbookingakvn.action?\' target=\'_Blank\'>click here</a>",
					 icon: "fa fa-question-circle",
					 animation: "scale",
					 closeAnimation: "scale",
                     opacity: 0.5,
                     buttons: {
                                "confirm": {
                                    text: "OK",
                                    btnClass: "btn-blue",
                                    action: function ()  { 
										window.location.href = "index.php?r=project/add"
									}
                                },
                                No: function () {
                                    $.alert("Please apply for land from AKVN land");
                                }, 
                            }
				});
		});', View::POS_READY, 'my-button-handler');

?>
