<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

 
$this->title = 'Dashboard'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<style>
.stats .col-lg-3 {
    width: 20%;
}
.nav-tabs > li.active {
   border-top: 1px solid #ccc;
}
.tab-content {border:1px solid #ccc; padding:40px; border-top:0px;}
.nav-pills, .nav-tabs {
    margin-bottom: 0px; 
}
</style>

<div class="container-fluid" style="margin:0px;border:0px;">
<h1><?php // echo Html::encode($this->title) ?></h1>

    
    <div class="row stats">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
						<span class="counter" style="display: inline-block;"><?=$incomplete;?></span>
                    </div>
                    <div class="desc"> Incomplete </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                      
                        <span class="counter" style="display: inline-block;"><?=$total_completed;?></span>
					</div>
                    <div class="desc"> Pending with Dept </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" style="display: inline-block;">0</span>
                    </div>
                    <div class="desc"> Pending with you </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" style="display: inline-block;">0</span></div>
                    <div class="desc">Approved </div>
                </div>
            </a>
        </div>
		
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" style="display: inline-block;">0</span>
                    </div>
                    <div class="desc">Rejected </div>
                </div>
            </a>
        </div>

    </div>

	
    <div class="clearfix"></div> 

	<h3> </h3>
	
	<a href="<?= Url::to(['project/add']) ?>" class="btn btn-primary">Start a new Bussiness/Investment</a> 
	&nbsp;&nbsp;&nbsp;
  <a href="<?= Url::to(['project/existing']) ?>" class="btn btn-primary">Add Existing Bussiness/Investment</a>
&nbsp;<br>
&nbsp;<br>
&nbsp;<br>


<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
?> 

<?php 
if(isset($investor_projects)) { 
  if(count($investor_projects)) {
    foreach ($investor_projects as $project): 
	
	 if($project->type == 'new') {  
		 $status = ($project->department_approval ? 'Approved' : 'Pending');
	 }
	 else {
		 $status = 'Approved';	
	 }

	 if($project->type == 'new') {  
		 $link = ($project->department_approval ? '<a href="' . Url::to(['wizard/prestablish', 'id' => $project->id]) . '">Pre Establishment Service Wizard</a> | <a href="' . Url::to(['wizard/pre-operational', 'id' => $project->id]) . '">Pre-Operational Service Wizard</a>' : 'Pending');
	 }
	 else {
	    $link = 'Approved';	
    }
?>




<?php
$pre_est_service_table = '';
if(isset($investorProjectDetail)) {
	if(count($investorProjectDetail)) {
		$i = 1;
		foreach ($investorProjectDetail as $service): 
			if($service->type == '' || $service->type == 'pre-establish') {

				if($service->project_id == $project->id) {
					$service_id = $service->service_id;	

					$disabled = '';
					$checked = '';
					$img = '';
					if($service->status) {
						$disabled = 'disabled';
						$checked = 'checked'; 
					}
					
					$preview = '';
					if($service->completed) { 
						$img = '<img src="images/apply.png" style="width:20px;"/> &nbsp;&nbsp;';
						$img = '<a href="' . Url::to(['investor/services', 'project_id' => $project->id, 'serviceid' => $service_id, 'action' => 'view']) . '">Draft</a>';
						
						//$preview = ' <a href="' . Url::to(['investor/services', 'project_id' => $project->id, 'serviceid' => $service_id, 'action' => 'view']) . '">Preview</a>';
					}
					else {
						
						//$img = '<a href="' . Url::to(['investor/services', 'project_id' => $project->id]) . '" class="btn btn-primary">Apply Services</a>';
					}
					?>
				<?php 
					$service_name = '';	
					if(isset($services[$service_id]['name'])) { $service_name =  $services[$service_id]['name']; } 

					$pre_est_service_table .= '<div class="row"  style="padding:10px 0px;"> 
						<div class="col-lg-1 col">'.$i.'</div> 
						<div class="col-lg-7 col">'.$service_name.'</div>  
						<div class="col-lg-2 col"> 
							 <input type="checkbox" name="services[]" value="'.$service_id.'" '.$disabled.' '.$checked.'/> 
							&nbsp;&nbsp;'.$img.'
						</div> 
						<div class="col-lg-1 col"> 
							' . $preview . '
						</div>
				   </div>';  
					$i++; 
				}
		}
		endforeach; 
	}
} 
$servicelist = '';
if($pre_est_service_table ) { 
		$servicelist = 
		'
		<form method="post">
		 <input type="hidden" name="project" value="'.$project->id.'"/> 
		 <input type="hidden" name="type" value="service"/> 
		<div style=""> 
		 
			<div class="row">&nbsp;<br></div>
			<div><strong>List of Services to apply:</strong> </div>
			<div class="row"> 
				<div class="col-lg-1 col"><strong>#</strong> </div>
				<div class="col-lg-7 col"><strong>Service Name</strong> </div> 
				<div class="col-lg-2 col text-center"><strong>Applied</strong> </div> 
				<div class="col-lg-1 col text-center"><strong>Preview</strong> </div> 
			</div>
			 '. $pre_est_service_table .'

			 <div class="row"> 
				<div class="col-lg-1 col"></div>
				<div class="col-lg-7 col">&nbsp;<br><a href="' . Url::to(['investor/cafservices', 'projectId' => $project->id]) . '">Preview</a></div> 
				<div class="col-lg-2 col"><input type="submit" value="Apply"class="btn btn-primary"/></div>
			</div>
			<p>&nbsp;<br>&nbsp;<br></p>  
		</div>

             <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'" />
		</form>
		'; 
}

////----------------------------------------------------------------------------------

$pre_oper_service_table = '';
if(isset($investorProjectDetail)) {
	if(count($investorProjectDetail)) {
		$i = 1;
		foreach ($investorProjectDetail as $service): 
			if($service->type == 'pre-operational') {

				if($service->project_id == $project->id) {
					$service_id = $service->service_id;	

					$disabled = '';
					$checked = '';
					$img = '';
					if($service->status) {
						$disabled = 'disabled';
						$checked = 'checked'; 
					}
					
					$preview = '';
					if($service->completed) { 
						$img = '<img src="images/apply.png" style="width:20px;"/> &nbsp;&nbsp;';
						$img = '<a href="' . Url::to(['investor/services', 'project_id' => $project->id, 'serviceid' => $service_id, 'action' => 'view']) . '">Draft</a>';
						
						//$preview = ' <a href="' . Url::to(['investor/services', 'project_id' => $project->id, 'serviceid' => $service_id, 'action' => 'view']) . '">Preview</a>';
					}
					else {
						
						//$img = '<a href="' . Url::to(['investor/services', 'project_id' => $project->id]) . '" class="btn btn-primary">Apply Services</a>';
					}
					?>
				<?php 
					$service_name = '';	
					if(isset($services[$service_id]['name'])) { $service_name =  $services[$service_id]['name']; } 

					$pre_oper_service_table .= '<div class="row"  style="padding:10px 0px;"> 
						<div class="col-lg-1 col">'.$i.'</div> 
						<div class="col-lg-7 col">'.$service_name.'</div>  
						<div class="col-lg-2 col"> 
							 <input type="checkbox" name="services[]" value="'.$service_id.'" '.$disabled.' '.$checked.'/> 
							&nbsp;&nbsp;'.$img.'
						</div> 
						<div class="col-lg-1 col"> 
							' . $preview . '
						</div>
				   </div>';  
					$i++; 
				}
		}
		endforeach; 
	}
} 
$pre_operational_servicelist = '';
if($pre_oper_service_table) { 
		$pre_operational_servicelist = '<form method="post">
		 <input type="hidden" name="project" value="'.$project->id.'"/> 
		 <input type="hidden" name="type" value="preoperational-service"/> 
		<div>
			<div class="row">&nbsp;<br></div>
			<div><strong>List of Services to apply:</strong> </div>
			<div class="row"> 
				<div class="col-lg-1 col"><strong>#</strong> </div>
				<div class="col-lg-7 col"><strong>Service Name</strong> </div> 
				<div class="col-lg-2 col text-center"><strong>Applied</strong> </div> 
				<div class="col-lg-1 col text-center"><strong>Preview</strong> </div> 
			</div>
			 '. $pre_oper_service_table .'
			 <div class="row"> 
				<div class="col-lg-1 col"></div>
				<div class="col-lg-7 col">&nbsp;<br><a href="' . Url::to(['investor/cafservices', 'projectId' => $project->id]) . '">Preview</a></div> 
				<div class="col-lg-2 col"><input type="submit" value="Apply"class="btn btn-primary"/></div>
			</div>
			<p>&nbsp;<br>&nbsp;<br></p>
		</div>
             <input type="hidden" name="_csrf" value="' . Yii::$app->request->getCsrfToken() . '" />
		</form>'; 
}


$next_step = '';
if($status != 'Pending') {
	$next_step = '&nbsp;<br>&nbsp;<br><div class="row">
							<div class="col-lg-12">
							<h3 data-toggle="collapse" data-target="#demo'.$project->id.'" style="cursor:pointer;">Do you have land ?</h3> 
							</div> 
						</div> 

						<div id="demo'.$project->id.'" class="collapse in">

							<fieldset style="border:1px solid #c0c0c0;padding:20px;">
							  <legend style="width:auto;margin:0px;border-bottom:0px;">Pre Establishment Services:</legend> 
								<div class="row">
									<div class="col-lg-12"><a href="' . Url::to(['wizard/prestablish', 'id' => $project->id]) . '">Apply Through Wizard</a> OR <a href="' . Url::to(['caf/services-manual', 'projectId' => $project->id]) . '">Apply Manually</a></div>
								</div>';

		if($servicelist) {
		 $next_step .=  '<div class="row">
									<div class="col-lg-12">Application Number : 0000'.$project->id.'&nbsp;&nbsp;<a href="' . Url::to(['investor/caf', 'projectId' => $project->id]) . '"><img src="images/view.png" style="width:20px;"/></a></div>
								</div>
								<div class="row">
									<div class="col-lg-12">Services</div>
								</div>
								<div class="row">
									<div class="col-lg-12">'.$servicelist.'</div>
								</div>';
		}

		 $next_step .=  '</fieldset>	
						</div>';



		if($pre_est_service_table) {
			$next_step .= '<div id="demo" class="collapse in">
							<fieldset style="border:1px solid #c0c0c0;padding:20px;">
							  <legend style="width:auto;margin:0px;border-bottom:0px;">Pre Operational Services:</legend> 
								<div class="row">
									<div class="col-lg-12"><a href="' . Url::to(['wizard/pre-operational', 'id' => $project->id]) . '">Apply Through Wizard</a> OR <a href="' . Url::to(['caf/services-manual', 'projectId' => $project->id]) . '">Apply Manually</a></div>
								</div>';

			if($pre_operational_servicelist) {
				 $next_step .=  '<div class="row">
										<div class="col-lg-12">Application Number : 0000'.$project->id.'&nbsp;&nbsp;<a href="' . Url::to(['investor/caf', 'projectId' => $project->id]) . '"><img src="images/view.png" style="width:20px;"/></a></div>
									</div>
									<div class="row">
										<div class="col-lg-12">Services</div>
									</div>
									<div class="row">
										<div class="col-lg-12">' . $pre_operational_servicelist . '</div>
									</div>';
			}

			 $next_step .=  '</fieldset>	
							</div>';
		}
}


$items[] =array(
            'label' => $project->project,
            'content' => '<div class="row">
							<div class="col-lg-2">Project Name: </div>
							<div class="col-lg-10">' . $project->project . '<a href="'.Url::to(['project/view', 'projectId' => $project->id]).'"/>&nbsp;&nbsp;<a href="' . Url::to(['investor/caf', 'projectId' => $project->id]) . '"><img src="images/view.png" style="width:20px;"/></a></a></div>
						</div>
						<div class="row">
							<div class="col-lg-2">Project Id: </div>
							<div class="col-lg-10"> ' . $project->id . '</div>
						</div>
						<div class="row">
							<div class="col-lg-2">Details: </div>
							<div class="col-lg-10"> '.$project->project_details.'</div>
						</div>
						<div class="row">
							<div class="col-lg-2">Sector: </div>
							<div class="col-lg-10"> '.$project->sector.' </div>
						</div><!-- 
						<div class="row">
							<div class="col-lg-2">New/Existing: </div>
							<div class="col-lg-10"> '.$project->type.' project </div>
						</div> -->
						<div class="row">
							<div class="col-lg-2">Status: </div>
							<div class="col-lg-10"> '.$status.'</div> 
						</div> 
						' . $next_step,
            'active' => false, 
			'options' => ['id' => $project->id],
        );

	endforeach; 

	echo Tabs::widget([
		'items' => $items 
	]);

  } 
}
?>

<p>&nbsp;<br>&nbsp;<br></p>

</div>