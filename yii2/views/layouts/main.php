<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

Yii::$app->cache->flush();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css"> 

	<script src="minimal/plugins/jquery.min.2.1.4.js"></script>
    <link rel="stylesheet" href="minimal/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="minimal/plugins/font-awesome/css/font-awesome.css">
    <script src="minimal/script.js"></script>
    <link rel="stylesheet" href="../themes/mpinvestnew/style.css">
    <link rel="stylesheet" href="minimal/plugins/my-flat-icon/my-icon.css">
    <link rel="stylesheet" href="minimal/css/content-box.css">
    <link rel="stylesheet" href="minimal/css/image-box.css">
    <link rel="stylesheet" href="minimal/css/animations.css">
    <link rel="stylesheet" href='minimal/css/components.css'>
    <link rel="stylesheet" href='minimal/plugins/flexslider/flexslider.css'>
    <link rel="stylesheet" href='minimal/plugins/magnific-popup.css'>
    <link rel="stylesheet" href='minimal/plugins/php/contact-form.css'>
    <link rel="stylesheet" href='minimal/plugins/social.stream.css'>
    <link rel="icon" href="minimal/images/favicon.png">
    <link rel="stylesheet" href="minimal/skin.css"><!-- Extra optional content header -->
    <link href="../themes/mpinvestnew/mycustom.css" rel="stylesheet">
    <link href="../themes/mpinvestnew/custom.css" rel="stylesheet">
    <link href="../themes/mpinvestnew/mycustom_2.css" rel="stylesheet">
    <link href="../themes/mpinvestnew/custom-bs-margin-padding.css" rel="stylesheet">
    <link href="../themes/mpinvestnew/responsivecss.css" rel="stylesheet">
    <link href="../themes/mpinvestnew/plugins/iconsmind/line-icons.min.css" rel="stylesheet">

    <link href="minimal/customforms.css" rel="stylesheet">

	<script src="js/angular.min.js"></script>
	
	 <style>
		[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
		  display: none !important;
		}
  </style>
</head>
<body>
<?php $this->beginBody() ?>


<?php  
//if($_SERVER['QUERY_STRING'] != '' && $_SERVER['QUERY_STRING'] != 'r=site%2Findex') { ?>
<div id="preloader"></div>
   
<div id="top-bar">
    <div class="container-fluid top-navigation">
        <div class="row">
            <div class="col-md-6">
                    <div class="logo-section">
                        <div class="row">
                            <div class="col-md-12">
                            <img src="../themes/mpinvestnew/images/logos/newlogo.png" class="logo">
                            </div>                            
                        </div>
                    </div>
            </div><!-- end col-md-6 -->

            <div class="col-md-6 hidden-xs">            
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <ul class="clearfix top_menu">
                                <li class="fac_desk">
                                    <a class="invslogin"  href="/"> <i class="fa fa-send"></i> Facilitation Desk</a>
                                    <div class="fac_desk_item">
                                        <span class="text-left"><b>General:</b></span><br>
                                        <a href="#" class="text-left" style="color: #d08346;">failitation@mptrifac.org</a><br>
                                        <span class="text-left"><b>Country Desk:</b></span><br>
                                        <a href="#" class="text-left" style="color: #d08346;">Japan:  japandesk@mpgov.in</a><br>
                                        <a href="#" class="text-left" style="color: #d08346;">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>
                                <li><a class="invslogin" href="/faq_trifac"><i class="fa fa-quora"></i>  FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="pt-15">
                            <!--<ul class="clearfix top_menu">
                                <li>
                                    <a href="/"><i class="fa fa-phone"></i> Contact us</a>
                                </li>
                                <li>
                                    <a href="/"><i class="now-ui-icons travel_info"></i> About Us</a>
                                </li>
                                <li class="fac_desk">
                                    <a href="/"> <i class="fa fa-send"></i> Facilitation Desk</a>
                                    <div class="fac_desk_item">
                                        <span class="text-left"><b>General:</b></span><br>
                                        <a href="#" class="text-left" style="color: #d08346;">failitation@mptrifac.org</a><br>
                                        <span class="text-left"><b>Country Desk:</b></span><br>
                                        <a href="#" class="text-left" style="color: #d08346;">Japan:  japandesk@mpgov.in</a><br>
                                        <a href="#" class="text-left" style="color: #d08346;">Korea:  koreadesk@mpgov.in </a>
                                    </div>
                                </li>

                                <li>
                                    <a href="/faq_trifac"> <i class="fa fa-lightbulb-o"></i> F.A.Q</a>
                                </li>
                            </ul>-->
                            <p class="white text-right"> <i class="fa fa-phone"></i> Helpdesk No: +91-755-2559971</p>
                        </div>
                    </div>
                </div>
            </div><!-- end col-md-6 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div>   

<nav class="navbar navbar-default main_nav"  data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="home_ico navbar-brand" href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>"><i class="fa fa-home"></i> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          
        
        <li><a href="/about-us">About</a></li>
          
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ease of Doing Business <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/list-of-pre-establishment-state-approvals" title="List of Pre Establishment State Approvals / Permissions you may require to start a business / industry">List of Pre Establishment State Approvals</a></li>
            <li><a href="/list-of-pre-operations-state-approvals" title="List of Pre-Operations State Approvals / Permissions you may require to start a business / industry">List of Pre-Operations State Approvals</a></li>
            <li><a href="/backoffice/index.php?r=wizard/service" title="Online Query for State Approvals /Permissions you may require to start a business / industry">Online Query for State Approvals</a></li>
          </ul>
        </li>
          
          
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advantage in MP <span class="caret"></span></a>
           <ul class="dropdown-menu">
				<li><a href="/advantage-mp/mp-at-glance">MP at a Glance</a></li>
				<li><a href="/advantagemp/VISION_2018_ENGLISH.pdf" target="_Blank">MP Vision 2018</a></li>
				<li><a href="/advantage-mp/industrial-scenario">Industrial Scenario of MP</a></li>
				<li><a href="/advantage-mp/profiles-of-potential-sector">Profiles of Potential Sector</a></li>
				<li><a href="/advantage-mp/incentives-and-concessions">Incentives and Concessions</a></li>
				<li><a href="/advantage-mp/investment-facilitation">Investment Facilitation</a></li>
				<li><a href="/advantage-mp/investors-information">Investors Information</a></li>
			</ul>
        </li>
        
        <li> <a href="/policy_act&rules">Policy Act & Rules</a> </li>
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Manual<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/citizencharter/citizencharter.pdf" target="_Blank">Citizen Charter</a></li>
            <li><a href="/usermanuals/swsportal.pdf" target="_Blank">SWS Portal</a></li>
			<li><a href="/usermanuals/akvnwater.pdf" target="_Blank">AKVN Water</a></li>
			<li><a href="/usermanual/boilerregistration.pdf" target="_Blank">Boiler Registration</a></li>
			<li><a href="/usermanual/boilerinspection.pdf" target="_Blank">Boiler Inspection</a></li> 
          </ul>
        </li>
          
          
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#" class="loginbtn white">Dashboard</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle loginbtn white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/backoffice/index.php?r=site/login">Investor Login</a></li>
            <li><a href="/backoffice/index.php?r=site/login">Department Login</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/backoffice/index.php?r=investor/register">Signup/Register</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End navigation -->   
<?php  //} ?> 

<div class="wrap11"> 
	
	<?= $content ?>
&nbsp;<br>&nbsp;<br>&nbsp;<br>	 
</div>


      <footer class="footer-minimal">
        <div class=" ">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-left">
                        <h4 class="white">ABOUT US</h4>
                        <div class="h-devider"></div>
                        <hr class="space s">
                        <img src="/{{ directory }}/images/logos/newlogo.png" alt="logo">
                        <hr class="space s">
                        <p style="font-size: 12px">
                            
Madhya Pradesh Trade & Investment Facilitation Corporation Limited (TRIFAC) formerly known as Madhya Pradesh Export Corporation Limited, is a Company established under Companies Act 1956 and Wholly owned by Government of Madhya Pradesh...<a href="about_us.html">more</a>
                        </p>
                    </div>
                    <div class="col-md-4 footer-left">
                        <h4 class="white">CONTACTS</h4>
                        <div class="h-devider"></div>
                        <hr class="space s">
                        <ul class="fa-ul">
                            <li><i class="fa-li im-map-marker2"></i> "CEDMAP BHAWAN" 16-A, Arera Hills Bhopal - 462001, M.P(India)</li>
                            <li><i class="fa-li im-cloud-smartphone"></i> +91-755-2575618, 2571830<br>+91-755-2559973</li>                 <li><i class="fa-li im-speach-bubble12"></i> facilitation@mptrifac.org</li>
                            <li><i class="fa-li im-phone"></i>Helpdesk : +91-755-2559971 (10:30 AM to 05:30 PM)</li>
                        </ul>
                        <div class="btn-group navbar-social">
                            <div class="btn-group social-group">
                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="white">INFOMATIONS</h4>
                        <div class="h-devider"></div>
                        <hr class="space s">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="fa-ul">
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Home</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Company</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Certifications</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Company</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Core Values</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="fa-ul">
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Faq</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Manuals</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Locations</a></li>
                                    <li><i class="fa-li im-right-3"></i> <a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <p class="white text-center">© 2017 M.P. Trade and Investment Facilitation Corporation Limited. &nbsp; <span class="pull-right"> &nbsp; Designed by <a href="#">E&Y</a></span> </p>
                </div>
            </div>      
          </div>
        </div>
    </footer> 
<?php $this->endBody() ?>
 <link rel="stylesheet" href="minimal/plugins/iconsmind/line-icons.min.css">
        <script async src="minimal/plugins/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="minimal/plugins/imagesloaded.min.js"></script>
        <script type="text/javascript" src="minimal/plugins/parallax.min.js"></script>
        <script type="text/javascript" src='minimal/plugins/flexslider/jquery.flexslider-min.js'></script>
        <script type="text/javascript" async src='minimal/plugins/isotope.min.js'></script>
        <script type="text/javascript" async src='minimal/plugins/php/contact-form.js'></script>
        <script type="text/javascript" async src='minimal/plugins/jquery.progress-counter.js'></script>
        <script type="text/javascript" async src='minimal/plugins/jquery.tab-accordion.js'></script>
        <script type="text/javascript" async src="minimal/plugins/bootstrap/js/bootstrap.popover.min.js"></script>
        <script type="text/javascript" async src="minimal/plugins/jquery.magnific-popup.min.js"></script>
        <script src='minimal/plugins/social.stream.min.js'></script>
        <script src='minimal/plugins/jquery.slimscroll.min.js'></script>
         
</body>
</html>
<?php $this->endPage() ?>
