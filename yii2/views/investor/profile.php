<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Investor Profile'; 
$this->params['breadcrumbs'][] = $this->title;
 
?>
 
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $this->title; ?></h2>		
		<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> 
	</div>
	<div class="col-lg-2"></div>
</div>
 
<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-investor">

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
}
 
if(null != Yii::$app->session->getFlash('success')) :?>
	<div class="alert alert-success"><?php echo Yii::$app->session->getFlash('success'); ?></div>
<?php endif?> 
	<div class="col-lg-12">
		<div class="register">
			
			<?php $form = ActiveForm::begin(); ?>

			<?= $form->errorSummary($user); ?>
			<?= $form->errorSummary($userprofile); ?>
				
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($user, 'email'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($user, 'password')->passwordInput(); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
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
						<?= $form->field($userprofile, 'pan_number'); ?>
					</div>
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'adhaar_number'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($userprofile, 'address'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($userprofile, 'country'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-12">
						<?= $form->field($userprofile, 'state'); ?>
					</div>
			</div>	
			<div class="row">
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'city'); ?>
					</div>
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'district'); ?>
					</div>
			</div> 
			<div class="row">
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'pincode'); ?>
					</div>
					<div class="col-lg-6">
						<?= $form->field($userprofile, 'mobile'); ?>
					</div>
			</div>   
			<div class="form-group">
					<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div><!-- register -->
	</div> 
</div>
</div>