<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;

$this->title = 'Investor Registration'; 
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = 'main';
?>
<style>
.form-horizontal .form-group { 
    margin: 0px;
}
form div.required label.control-label:after {
  content:" * ";
  color:red;
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

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
?>

<div class="container">

	<?php
	if(null != Yii::$app->session->getFlash('success')) :?>
		<div class="alert alert-success"><?php echo Yii::$app->session->getFlash('success'); ?></div>
	<?php endif?>
     
	<div class="col-lg-2">
	</div>
	<div class="col-lg-8">
        
                
		<div class="register">
			<?php
			$form = ActiveForm::begin([
					'id' => 'register',					
					'options' => 
						['class' => 'form-horizontal',
                                                 
						'name' => "register"],
                                        'enableAjaxValidation' => false,
				]);
			?>
			<?php // $form->errorSummary($user); ?>
			<?php // $form->errorSummary($userprofile); ?>  
            
            <div class="panel panel-warning">
            <div class="panel-heading">
                
			<h4 class="heading-primary text-uppercase mb-md">Sign Up</h4> 
            </div>
            <div class="panel-body">
                
		 <div class="featured-box featured-box-primary align-left mt-xlg" style="height:auto;">
			<div class="box-content">
				
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($user, 'email'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
						<?= $form->field($user, 'password')->passwordInput(); ?>
					</div>
			
					<div class="col-lg-6">
					<?= $form->field($user, 'password_repeat')->passwordInput(); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6"> 
						<?= $form->field($userprofile, 'first_name'); ?>
					</div>
					<div class="col-lg-6"> 
						<?= $form->field($userprofile, 'last_name'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'company_name'); ?> 
					</div>
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'pan_number')->label('Pan Number'); ?>
					</div>
			</div> 
			 
			<div class="row">
					<div class="col-lg-6"> 
						<?= $form->field($userprofile, 'mobile'); ?>
					</div>
					<div class="col-lg-6">  
						<?= $form->field($userprofile, 'adhaar_number',['enableAjaxValidation' => true, 'validateOnChange' => true]); ?>
					</div>
			</div>			
			<div class="row">
					<div class="col-lg-6"> 
						<?= $form->field($user, 'user_captcha')->widget(Captcha::className(),['options' => ['placeholder' => 'CAPTCHA Code', 'class' => 'form-control']]) ?>
					</div>
			</div>
			<div class="form-group"> 
					
					<?= Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right', 'name' => 'register-button']) ?>
			</div>
		
		</div>
		</div>

			<?php ActiveForm::end(); ?>
		</div><!-- register -->        
            </div>
        </div>
        
        
	</div>
</div> 

 