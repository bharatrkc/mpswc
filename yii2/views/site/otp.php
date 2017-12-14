<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
	if(null != Yii::$app->session->getFlash('success')) :?>
		<div class="alert alert-success"><?php echo Yii::$app->session->getFlash('success'); ?></div>
	<?php endif?> 

        <div class="row">
		 <div class="col-lg-3"></div>
            <div class="col-lg-5"> 

				 <div class="featured-box featured-box-primary align-left mt-xlg" style="margin-top:0px !important;">
			<div class="box-content"> 

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'otp')->textInput(['autofocus' => true])->label('OTP'); ?> 

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div></div>
            </div>
        </div> 
</div>
</div>