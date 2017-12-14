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
    
    
    </style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Welcome MD. John.</h2>

                    <div class="agile-detail">
                    <h4><span style="font-style:italic;">last logged in : </span><?= date("d M Y H:i:s"); ?></h4>       
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
    
  <div class="wrapper wrapper-content animated fadeInRight ecommerce">
    

    <div class="ibox-content m-b-sm border-bottom">
            
             <div class="row">
                 <div class="col-lg-12">
                 <div class="ibox">
              <div class="ibox-title" style="border: none;">
                    <h4>Investment Report Card </h4>
               </div>
               <div class="ibox-content">
                
                <div class="col-lg-3">
                    <div class="widget blue-bg p-lg text-center" id="animation_box1" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs">20 Cr</h1>
                            <h4 class="font-bold no-margins">
                                Net worth of Projects applied in FY 17
                            </h4>
                            
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    
                    <div class="widget yellow-bg p-lg text-center" id="animation_box2" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs">40</h1>
                            <h4 class="font-bold no-margins">
                                Projects Running in FY 17
                            </h4>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    
                    <div class="widget red-bg p-lg text-center" id="animation_box3" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs">5</h1>
                            <h4 class="font-bold no-margins">
                                Projects in Site Finalized Status
                            </h4>
                            

                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="widget navy-bg p-lg text-center" id="animation_box4" data-animation="pulse">
                        <div class="m-b-md">

                            <h1 class="m-xs">16</h1>
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
      
  <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                
                        <div class="ibox-title" style="border-bottom:2px solid #e7eaec; border-top:none;">
                            <h5>Projects List</h5>
                        </div>
                                <div class="ibox-content" style="border-top:none;">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <td>
                                                <div class="form-group">
                                                <label class="control-label" for="product_name">Project ID</label>
                                                </div>
                                                </td>
                                                <td>
                                                 <div class="form-group">
                                                <label class="control-label" for="product_name">Project Name</label>
                                                <input type="text" id="product_name" name="product_name" value="" placeholder="Service Name" class="form-control">
                                                 </div>
                                                </td>
                                                <td>
                                                  <div class="form-group">
                                                <label class="control-label" for="status">District</label>
                                                
                                                </div>
                                                </td>
                                                <td>
                                                <div class="form-group">
                                                <label class="control-label" for="price">Dept. Name</label>
                                                <input type="text" id="price" name="price" value="" placeholder="Name" class="form-control">
                                                </div>
                                                </td>
                                                
                                                <td>
                                                  <div class="form-group">
                                                <label class="control-label" for="status">Current Status</label>
                                                
                                                </div>
                                                </td>
                                                
                                                 <td>
                                                  <div class="form-group">
                                                <label class="control-label" for="status">Project Cost</label>
                                                
                                                </div>
                                                </td>
                                                
                                                <td>
                                                <div class="form-group">
                                                <label class="control-label" for="status">Applied Date</label>
                                                </div>
                                                </td>
                                                
                                                

                                                <td>                                
                                                    <label class="control-label" for="status">View</label>
                                                </td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Master project</td>
                                                <td>Satna</td>
                                                <td>Water Dept.</td>
                                                <td class="btn-success"><strong>Complete</strong></td>
                                                <td>5 Cr</td>
                                                <td>Jul 14, 2015</td>
                                                <td>                                
                                                    <span class="fa fa-history"></span>
                                                    
                                                </td>
                                            </tr>
                                            
                                            
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