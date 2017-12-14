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
 
    <link href="inspinia/css/style.css" rel="stylesheet">  
 
    <link href="inspinia/css/custom.css" rel="stylesheet">  

	<script src="js/angular.min.js"></script>
 
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
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
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
 
		<?= $content ?> 

		<div class="row">&nbsp;<br>&nbsp;<br></div> 


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
 
    </body>
</html>
<?php $this->endPage() ?>