<?php
namespace app\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserProfile;
use app\models\Roles; 

use yii\helpers\Precho;
use app\models\Notifications;

class BaseController extends \yii\web\Controller {
	 
	 	//public $layout = 'investorLayoutIspiniaTrifac';

		public function init()
	    {
	        parent::init();
	    }
/*
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

*/
        public function behaviors()
        {
            // Precho::pre(Yii::$app->user->identity->id);

            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => [ 'deptdash'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions'=>['deptdash'],
                         /*   'matchCallback' => function(){
                                if(isset(Yii::$app->user->identity->id) && Yii::$app->user->identity->id==3)
                                   {return true;}
                                else
                                    {return false;}
                           },


                           */
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

}