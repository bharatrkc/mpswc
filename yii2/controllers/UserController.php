<?php
namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserProfile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserController extends \yii\web\Controller {
	
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

	
	public function actionRegister() {

		$user = new User(); 
		$userprofile = new UserProfile();

		if ($user->load(Yii::$app->request->post())) {
			if (1) {
//echo '<pre>';var_dump($user);  exit;
				// form inputs are valid, do something here 
				if(!$user->save()){ 
					
					Yii::$app->getSession()->setFlash('success', 'Error to save user model<br />'.(serialize($user->getErrors())));

					return $this->render('register', [
						'user' => $user,
						'userprofile' => $userprofile,
					]); 
				}
				else {

					Yii::$app->getSession()->setFlash('success', 'You are registered and can login');
					$this->redirect('index.php'); 
					return;
				}
			}
		}

		return $this->render('register', [
			'user' => $user,
			'userprofile' => $userprofile,
		]);
	}

 

}
