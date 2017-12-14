<?php
namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use app\models\InvestorProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserProfile;
use app\models\Roles; 
use app\models\InvestorProjects;
use app\models\UploadForm;
use app\models\UploadedFile;
use app\models\Country;
use app\models\State;
use app\models\Tehsil;
use app\models\City;
use app\models\Town;
use yii\helpers\Html;

class ProjectController extends \yii\web\Controller { 
	
	public $layout = 'investorLayoutIspiniaCaf';
	
	//public $layout = 'investorLayoutIspinia'; 

	public function behaviors()
    {
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

    }
		 
	public function actionStates($id) { 

        $rows = State::find()->all();
        echo "<option>Select</option>";
        
		if(isset($rows)) {
			if(count($rows)>0){
				foreach($rows as $row){
					echo "<option value='$row->country_id'>$row->name</option>";
				}
			}
			else{
				echo "<option>No States Available</option>";
			}
		}
   
 
    }
	public function actionDistrictcities($id) { 

        $rows = City::find()->where(['district_id'=>$id])->all();
//$rows = City::find()->where(['investor_id'=>$id])->one();		

        echo "<option>Select</option>";
        
		if(isset($rows)) {
			if(count($rows)>0){
				foreach($rows as $row){
					echo "<option value='$row->id'>$row->name</option>";
				}
			}
			else{
				echo "<option>No Districts Available</option>";
			}
		}
   
 
    }
	public function actionDistricttehsils($id) { 

        $rows = Tehsil::find()->where(['district_id'=>$id])->all();
 
        echo "<option>Select</option>";
        
		if(isset($rows)) {
			if(count($rows)>0){
				foreach($rows as $row){
					echo "<option value='$row->id'>$row->name</option>";
				}
			}
			else{
				echo "<option>No Tehsil Available</option>";
			}
		}
   
 
    }


	public function actionCitytowns($id) { 

        $rows = Town::find()->where(['city_id'=>$id])->all(); 
        echo "<option>Select</option>";
        
		if(isset($rows)) {
			if(count($rows)>0){
				foreach($rows as $row){
					echo "<option value='$row->id'>$row->name</option>";
				}
			}
			else{
				echo "<option>No towns available</option>";
			}
		}
   
 
    }

	
	public function actionView() { 

		$user_id = '';
		if(isset(Yii::$app->user->identity->id)) {
			$user_id = Yii::$app->user->identity->id; 
		}
		
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		
		if($project_id == '') {
			return $this->redirect(['investor/index']);
		}

		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->one();	
		
		if(count($investor_project) == 0) {
			return $this->redirect(['investor/index']);
		}  

		return $this->render('projectview', [
			'model' => $investor_project,
			'user_id' => $user_id]);  		 
 
	}

	public function actionAdd() { 

		$user_id = '';
		if(isset(Yii::$app->user->identity->id)) {
			$user_id = Yii::$app->user->identity->id; 
		}
		
        $model = new InvestorProjects();  
 
        $request = Yii::$app->request;
		$post = $request->post();

		if (count($post)) {
			$model->investor_id = $user_id; 
			$model->type = 'new'; 
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->getSession()->setFlash('success', 'Project added successfully!'); 
            return $this->redirect(['investor/index']);

        }
		else {
				
			$query = new Query;
			$query->select('m2, name')->from('yii_master_code')->where(['m1' => '1'])->orderBy('name');
			$command = $query->createCommand();
            $sectors = $command->queryAll(); 
			
			return $this->render('project', [
				'model' => $model,
				'user_id' => $user_id,
				'sectors' => $sectors]);  
        }
		 
 
	}

	

	
	public function actionExisting() { 

		$user_id = '';
		if(isset(Yii::$app->user->identity->id)) {
			
			$user_id = Yii::$app->user->identity->id; 
		}

        $model = new InvestorProjects();  
 
        $request = Yii::$app->request;
		$post = $request->post();


		if (count($post)) {
			$model->investor_id = $user_id;
			$model->department_approval = 1; 
			$model->type = 'existing'; 
		}

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
			
			Yii::$app->getSession()->setFlash('success', 'Project added successfully!'); 
            return $this->redirect(['investor/index']);

        }
		else {
            return $this->render('existing', [
			'model' => $model,
			'user_id' => $user_id]);  
        }
		 
 
	} 

}
