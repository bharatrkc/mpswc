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
                    <h2>Gold Standerd Report</h2>
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
                    <h4>Department Report Card </h4>
               </div>
               <div class="ibox-content">
                
               
                    
                    
                        <div id="morris-bar-chart" style="position: relative;"><svg height="342" version="1.1" width="970" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.84375" y="308" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.34375,308H460" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.84375" y="237.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.34375,237.25H460" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.84375" y="166.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.34375,166.5H460" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.84375" y="95.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.34375,95.75H460" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.84375" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.34375,25H460" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="430.38169642857144" y="320.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dept. 4</tspan></text><text x="311.90848214285717" y="320.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dept. 3</tspan></text><text x="193.43526785714286" y="320.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dept. 2</tspan></text><text x="74.96205357142857" y="320.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dept. 1</tspan></text><rect x="52.748325892857146" y="138.2" width="20.71372767857143" height="169.8" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="76.46205357142858" y="166.5" width="20.71372767857143" height="141.5" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="111.98493303571428" y="95.75" width="20.71372767857143" height="212.25" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="135.69866071428572" y="124.04999999999998" width="20.71372767857143" height="183.95000000000002" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="171.22154017857142" y="166.5" width="20.71372767857143" height="141.5" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="194.93526785714283" y="194.8" width="20.71372767857143" height="113.19999999999999" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="230.45814732142858" y="95.75" width="20.71372767857143" height="212.25" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="254.171875" y="124.04999999999998" width="20.71372767857143" height="183.95000000000002" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="289.6947544642857" y="166.5" width="20.71372767857143" height="141.5" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="313.40848214285717" y="194.8" width="20.71372767857143" height="113.19999999999999" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="348.9313616071429" y="95.75" width="20.71372767857143" height="212.25" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="372.64508928571433" y="124.04999999999998" width="20.71372767857143" height="183.95000000000002" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="408.16796875000006" y="25" width="20.71372767857143" height="283" r="0" rx="0" ry="0" fill="#1ab394" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="431.8816964285715" y="53.29999999999998" width="20.71372767857143" height="254.70000000000002" r="0" rx="0" ry="0" fill="#cacaca" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                    
                
                <div> X - Axis : Department Name</div>
                <div> Y - Axis : Number Of Days</div>
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
                            <h5>Department List - Decending Order of Performance</h5>
                        </div>
                                <div class="ibox-content" style="border-top:none;">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <td>
                                                <div class="form-group">
                                                <label class="control-label" for="product_name">S. No.</label>
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
                                                <label class="control-label" for="status">Days</label>
                                                
                                                </div>
                                                </td>
                                                
                                                <td>
                                                <div class="form-group">
                                                <label class="control-label" for="status">Avg Time(days)</label>
                                                </div>
                                                </td>
                                                
                                                

                                                
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                
                                                <td>Water Dept.</td>

                                                <td>5</td>
                                                <td>3</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                
                                                <td>Water Dept.</td>

                                                <td>5</td>
                                                <td>3</td>
                                                
                                            </tr>
						<tr>
                                                <td>3</td>
                                                
                                                <td>Water Dept.</td>

                                                <td>5</td>
                                                <td>3</td>
                                                
                                            </tr>
						<tr>
                                                <td>4</td>
                                                
                                                <td>Water Dept.</td>

                                                <td>5</td>
                                                <td>3</td>
                                                
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
                $("#animation_box1").addClass("widget blue-bg p-lg text-center");
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
