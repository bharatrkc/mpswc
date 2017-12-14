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

<?php

foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}

?>
	<div class="col-lg-3">
	</div>
	<div class="col-lg-6">
		<div class="site-login">
			<?php 
			 
			  $form = ActiveForm::begin([
					'id' => 'investorLogin',				
					'options' => [
						'class' => 'form-horizontal', 
						'ng-app' => 'myApp',
						'ng-controller' => 'validateCtrl', 
						'name' => "investorLogin",],
				]);
			 
			 ?>

            
            <div class="panel panel-warning">
              <div class="panel-heading">
                            <h4 class="heading-primary text-uppercase mb-md">Sign In</h4> 
              </div>
              <div class="panel-body">
                  <div class="featured-box featured-box-primary align-left mt-xlg" style="margin-top:0px !important;">
                        <div class="box-content">
                            <div class="row"> 
                                <div class="col-md-12">

                                    <?= $form->field($model, 'username', [
                                        'template' => "<div style='width:150px;display: inline-block;float: left;'>{label}\n<i class='fa fa-user'></i></div>\n{input}".'

                                        <span style="color:red"  ng-cloak  ng-show = "investorLogin[\'LoginForm[username]\'].$dirty && investorLogin[\'LoginForm[username]\'].$invalid">
                                            <span ng-show="investorLogin[\'LoginForm[username]\'].$error.required">Email is required.</span> 
                                            <span ng-show="investorLogin[\'LoginForm[username]\'].$error.pattern">Invalid email address.</span>
                                        </span>
                                        '."\n{hint}\n{error}",

                                        'labelOptions' => [ 'class' => 'control-label' ],
                                        'inputOptions' => [
                                            'ng-model' => 'username', 
                                            'required' => 'required',  
                                            'pattern' => "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}"
                                         ],
                                        ])->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Email');?> 
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="col-md-12"> 


                                    <?= $form->field($model, 'password', [
                                        'inputOptions' => [
                                            'ng-model' => 'password', 
                                            'required' => 'required',],
                                            'template' => "
                                            <div style='width: 150px;display: inline-block;float: left;'>{label}\n
                                            <i class='fa fa-key'></i></div>\n{input}" . '

                                            <span style="color:red"  ng-cloak  ng-show = "investorLogin[\'LoginForm[password]\'].$dirty && investorLogin[\'LoginForm[password]\'].$invalid && !investorLogin[\'LoginForm[password]\'].$pristine"> 
                                                <span ng-show="investorLogin[\'LoginForm[password]\'].$error.required">Password is required.</span>
                                            </span>'."\n{hint}\n{error}",
                                            'labelOptions' => [ 'class' => 'control-label' ]
                                            ]
                                            )->passwordInput(['maxlength' => true,  'class' => 'form-control']); ?> 

                                    <?= Html::a('(Forgot Password?)', ['site/request-password-reset'], ['class'=> 'pull-right']) ?>

                                </div> 
                            </div>		

                        <div class="row">
                                <div class="col-lg-6"> 
                                    <?= $form->field($model, 'captcha')->widget(Captcha::className(),['options' => ['placeholder' => 'CAPTCHA Code', 'class' => 'form-control']]) ?>
                                </div>
                        </div>


                            <div class="row">&nbsp;<br></div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <span class="remember-box checkbox"> 
                                            <label for="rememberme"> 
                                                <?php 
                                                //echo \yii\helpers\Html::activeCheckbox($model,'rememberMe');
                                                ?> 
                                            </label> 
                                        </span> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-11"> 
                                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>

                                            </div>
                                        </div>
                                    </div>
                           </div>

                           <div class="row">&nbsp;<br></div>
                    <?php ActiveForm::end(); ?> 
                </div>
                </div>
                
              </div><!-- end panel body -->
            </div>
            
	
             
        
        </div><!-- end site-login div -->
    </div>


<script>

var app = angular.module('myApp', []); 
app.controller('validateCtrl', function($scope) {}); 

</script>