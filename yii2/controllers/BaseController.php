<?php
namespace app\components;

use Yii;
use yii\filters\AccessControl;
use app\models\InvestorProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserProfile;
use app\models\Roles; 
use app\models\Notifications;
use yii\helpers\BaseUrl;
use yii\helpers\Precho;

class BaseController extends \yii\web\Controller {
	 
	 	public $layout = 'investorLayoutIspiniaTrifac';

		public function init()
	    {
	        parent::init();
	    }

	    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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

	}
}