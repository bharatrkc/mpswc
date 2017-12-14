<?php 
/* @var $this \yii\web\View */
/* @var $content string */ 
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url; 
use app\models\UserProfile;
use app\models\InvestorProjects;

AppAsset::register($this);

Yii::$app->cache->flush();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  

    <link href="inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">  
    <link href="inspinia/css/animate.css" rel="stylesheet">

	 <!-- <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" rel="stylesheet" type="text/css" /> -->
    <link href="inspinia/css/style.css" rel="stylesheet">  
    <link href="inspinia/css/style_new.css" rel="stylesheet">  
	
    <link href="inspinia/css/custom.css" rel="stylesheet">  

  

<style>
div.required label.control-label:after {
    content: " *";
    color: red;
}
.checkbox.i-checks{ margin-bottom:15px;}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px 26px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin-right: 5px;
}
.dropdown {
    position: relative;
    display: inline-block;
} 
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;	
    right: 0px;
	padding:0px;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
} 
.dropdown-content a:hover {
    background-color: #4CAF50;color:#fff;}

.dropdown:hover .dropdown-content {
    display: block;
} 
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
} 
</style>
</head>

<body>

 <?php $this->beginBody() ?>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
							<a href="<?php echo Yii::$app->homeUrl; ?>"></a>
                            <img alt="image" class="img-circle" src="inspinia/img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">
							 <?php					
								$user_id = Yii::$app->user->identity->id; 
								$userprofile = UserProfile::findOne(['user_id' => $user_id]);
							   ?>
								<strong class="font-bold"><?= $userprofile['first_name']; ?> <?= $userprofile['last_name']; ?></strong>
                             </span> <span class="text-muted text-xs block">Investor <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?= Url::to(['investor/profile']) ?>">Profile</a></li>


                            <li><a href="<?= Url::to(['investor/contacts']) ?>">Contacts</a></li>
                            <li class="divider"></li>
                            <li> <a  href="<?= Url::to(['site/logout']) ?>" data-method="post">Logout</a></li>


                        </ul>
                    </div>
                    <div class="logo-element">
                        MENU+
                    </div>
                </li>
                <li class="active">
                   <a href="<?= Url::to(['investor/dashboard']) ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a> 
                </li> 
                <!-- <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= Url::to(['investor/reports1']) ?>">Reports 1</a></li>
                        <li><a href="<?= Url::to(['investor/reports2']) ?>">Reports 2</a></li> 
                        <li><a href="<?= Url::to(['investor/reports3']) ?>">Reports 3</a></li>  
                    </ul>
                </li> 
                <li>
                    <a href="<?= Url::to(['investor/contacts']) ?>"><i class="fa fa-desktop"></i> <span class="nav-label">Important Contacts</span> </a>
                    
                </li>   
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">List</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level"> 
                        <li><a href="<?= Url::to(['investor/list']) ?>">List XYZ</a></li> 
                    </ul>
                </li>  -->
                
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="<?= Url::to(['search/result']) ?>">
			
             <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>" />
                <div class="form-group">
                    <input type="text" placeholder="Search..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
	 
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to TRIFAC.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"><!-- notification number --></span>
                    </a>
                    
                </li>


                <li>
                    <a  href="<?= Url::to(['site/logout']) ?>" data-method="post">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>


        <div class="wrapper wrapper-content"> 
		
		
			<?= $content ?> 

			<div class="row">&nbsp;<br>&nbsp;<br></div>
        </div>


        <div class="footer">
            <div class="pull-right">
                 
            </div>
            <div>
                <strong>Copyright</strong> TRIFAC &copy; 2017
            </div>
        </div>

        </div>
    </div> 
 

    <?php $this->endBody() ?>

    <!-- Mainly scripts  --> 
    <script src="inspinia/js/jquery-2.1.1.js"></script> 
	<script src="inspinia/js/bootstrap.min.js"></script>
    <script src="inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


	  <!-- Data Tables -->
    <script src="inspinia/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="inspinia/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="inspinia/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="inspinia/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Flot -->
    <script src="inspinia/js/plugins/flot/jquery.flot.js"></script>
    <script src="inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="inspinia/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="inspinia/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="inspinia/js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="inspinia/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="inspinia/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="inspinia/js/inspinia.js"></script>
    <script src="inspinia/js/plugins/pace/pace.min.js"></script> 

    <!-- jQuery UI -->
    <script src="inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="inspinia/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="inspinia/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="inspinia/js/plugins/chartJs/Chart.min.js"></script>
 
 
    </body>
</html>
<?php $this->endPage() ?>