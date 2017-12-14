<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Breadcrumbs;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
.form-horizontal .form-group { 
    margin: 0px;
} 

form div.required label.control-label:after {
  content:" * ";
  color:red;
}
 input.ng-invalid.ng-touched {
    border: 1px solid #FF0000; 
  }
 input.focusOn.ng-invalid { 
    border: 1px solid #ccc; 
  }

  .btn-primary[disabled], .btn-primary[disabled]:hover, .btn-primary[disabled]:active, .btn-primary[disabled]:focus { 
    color: #ffffaa;
}

</style>

<div role="main" class="main">
	<section class="page-header">
		<div class="container"> 
			<div class="row">
				<div class="col-md-9 col-md-offset-3">
					<h1><?= Html::encode($this->title) ?></h1> 		 
				</div>
			</div>
		</div>
	</section>
 </div>

<div class="container">


	<div class="col-lg-3">
	</div>
	<div class="col-lg-6">
		<div class="site-login">
			

            
            <div class="panel panel-warning">
              <div class="panel-heading">
                            <h4 class="heading-primary text-uppercase mb-md">Sign In</h4> 
              </div>
              <div class="panel-body">
                  <div class="featured-box featured-box-primary align-left mt-xlg" style="margin-top:0px !important;">
                    <div class="box-content">

                    </div>
                </div>
                
              </div><!-- end panel body -->
            </div>
            
	
             
        
        </div><!-- end site-login div -->
    </div>
</div>

<script>

var app = angular.module('myApp', []); 
app.controller('validateCtrl', function($scope) {}); 

</script>