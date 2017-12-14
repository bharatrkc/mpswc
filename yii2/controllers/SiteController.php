<?php
namespace app\controllers;

use Yii;
use Url;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;  
use app\models\InvestorProject;
use app\models\InvestorProjects;
use app\models\User;
use app\models\UserProfile;
use app\models\Roles; 
use app\models\InvestorProjectDetail;

use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\OtpForm;  

class SiteController extends Controller {

    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout'], 
                        'allow' => true,
                        'roles' => ['@'], 
                    ], 
					[
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'], 
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex() { 
		
	    $user_id = Yii::$app->user->identity->id;
		
		$user = \Yii::$app->user->identity;

		\Yii::$app->authManager;
		$getRolesByUser = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
		
		if(isset(array_keys($getRolesByUser)[0])) {
			$Role = array_keys($getRolesByUser)[0];
			if($Role == 'admin') {
				return $this->redirect(['superadmin/index']);
			}
			if($Role == 'cm') {
				return $this->redirect(['cm/index']);
			}
			if($Role == 'investor') {
				return $this->redirect(['investor/index']);
			}
			if($Role == 'department') {
				return $this->redirect(['department/index']);
			}
			if($Role == 'trifac') {
				return $this->redirect(['trifac/index']);
			}
			

			;print_r($Role); 
		 echo '<pre>';print_r($getRolesByUser); exit;
		}
		else {
			return $this->redirect(['investor/index']);
		}

		
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'department_approval' => 1])->all();

		if(count($investor_project)) {
			//-------------------Dashboard--------------------------------
			$query = InvestorProject::find();  
			$investor_project = $query->where(['investor_id' => $user_id])->all();

			$investorProjectDetail = new InvestorProjectDetail();  
			$query = InvestorProjectDetail::find();  
			$investorProjectDetail = $query->where(['investor_id' => $user_id])->all();

			$total_completed = 0;
			$incomplete = 0;
			foreach($investorProjectDetail as $investorproject_detail) {

				$investorProjectDetail_arr[$investorproject_detail->service_id] = $investorproject_detail;  

				
				if($investorproject_detail->completed) { 
					$total_completed++;
				}
				else{
					$incomplete++;
				}
			}
			return $this->render('index', [
				'investor_project' => $investor_project,
				'investorProjectDetail' => $investorProjectDetail,
				'total_completed' => $total_completed,
				'incomplete' => $incomplete,
				
			]);
			//--------------Dashboard------//
		}
		else { 
			return $this->render('firstimeInvestor');
		}

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) { 
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }


    public function actionPrestablishlist()
    {

            return $this->render('prestablishlist', [

            ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

	
   /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {

                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }
			else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

	
	
    public function actionOtp()
    {
        $model = new OtpForm();

        if ($model->load(Yii::$app->request->post())) {
          
		   Yii::$app->getSession()->setFlash('success', 'You are registered and can login');
		   return $this->redirect(['site/login']);

        }
        return $this->render('otp', [
            'model' => $model,
        ]);
    }
}
