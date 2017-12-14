<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\InvestorProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserProfile;
use app\models\Roles; 
use app\models\InvestorProjectDetail;
use app\models\InvestorProjects;
use app\models\Services;

use app\models\Caf;

class CmController extends \yii\web\Controller {
	 
	public $layout = 'investorLayoutIspiniaCm'; 


	public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [ 'index', 'profile', 'service'],
                'rules' => [
                    [ 
                        'allow' => true,
                        'roles' => ['@'],
                    ], 
                ],
            ], 
        ];
    }


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

        return $this->render('dashboard');

    } 

}
