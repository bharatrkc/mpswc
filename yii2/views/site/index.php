<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
 

$this->title = 'Dashboard';

$this->context->layout = 'investorLayout';

Yii::$app->cache->flush();
  

if(null != Yii::$app->session->getFlash('success')) :?>
	<div class="alert alert-success"><?php echo Yii::$app->session->getFlash('success'); ?></div>

<?php  endif;?>

<style>
.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
} 

.project-list .row{border-bottom:1px solid #ccc;}
.row .col{padding:10px 5px;}

.stats .col-lg-3 {
    width: 20%;
}

</style>


<div class="container-fluid" style="margin:0px;border:0px;">

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

	 


<h1><?= Html::encode($this->title) ?></h1>

<?php
if(isset($investor_project)) {
?>
<div class="container-fluid project-list">

    <div class="row"> 
        <div class="col-lg-1 col"><strong>Project Id</strong></div>
        <div class="col-lg-2 col"><strong>Project Name</strong></div>
        <div class="col-lg-3 col"><strong>Project Description</strong></div>
        <div class="col-lg-2 col"><strong>Sector</strong></div> 
        <div class="col-lg-2 col"><strong>Intention Status</strong></div>
        <div class="col-lg-2 col"><strong>CAF - A Details</strong></div>  
	</div>
<?php

if(count($investor_project)) {
foreach ($investor_project as $project): ?>
 
	 <div class="row"> 
		<div class="col-lg-1 col"><?php print $project->caf_id;?></div>
		<div class="col-lg-2 col"><?php print $project->project_name;?></div>
		<div class="col-lg-3 col"><?php print $project->project_description;?></div> 
		<div class="col-lg-2 col"><?php print $project->sector;?></div> 
		<div class="col-lg-2 col">Pending for CAF - A Details</div>  
		<div class="col-lg-2 col text-center"><a href="<?= Url::to(['investor/cafservices']) ?>&projectId=<?php print $project->caf_id;?>">Proceed</a></div>
	</div>
    
<?php
endforeach; 
}
else {

	echo '<div class="row"><div class="col-lg-12 text-center" style="padding:20px;">No Projects created - check <a href="'. Url::to(['wizard/prestablish']).'">CAF</a></div></div>';
}
?>
 
</div>

<?php } ?>
 
 
<p>&nbsp;<br>&nbsp;<br></p>

</div>
