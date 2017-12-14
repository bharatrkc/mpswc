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
use yii\helpers\BaseUrl;
use app\models\CompanyType;
use app\models\MmLineOfActivity;
use app\models\RolesExt;


class ProjectController extends \yii\web\Controller { 
	
	public $layout = 'investorLayoutIspiniaCaf';
	
	//public $layout = 'investorLayoutIspinia'; 

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [ 'add'],
                'rules' => [
                    [ 
                        'allow' => true,
                        'actions'=>['add'],
                       'matchCallback' => function(){
	                       	if(isset(Yii::$app->user->identity->id) && Yii::$app->user->identity->id==42)
	                       		return true;
	                       	return false;
                       },
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

    	/**
    	* @author Hemant thakur
    	*/

        private function mysql_escape_string($string) {
            $link = mysqli_connect('localhost', 'root', '', 'yii2investmp');
            $string = mysqli_real_escape_string($link, $string);
            mysqli_close($link);
            return $string;
        }
        /**
        *@author Hemant thakur
        */
    	private function sanatizeParams($parameter, $strip_tags = true) {
	        if (is_array($parameter)) {
	            $results = array();
	            foreach ($parameter as $key => $value) {
	            	/**
	            	* check for nested array 
	            	*added by Hemant Thakur
	            	*/
	            	if(is_array($value)){
	            		$returnValue[$key]=$this->sanatizeParams($value);
	            		$results=array_merge($results,$returnValue);
	            		continue;
	            	}
	            	// edit finished
	                $value = trim($value);
	                if ($strip_tags) {
	                    $value = strip_tags($value);
	                }
	                $value = $this->mysql_escape_string($value);
	                $results[$key] = $value;
	            }
	            return $results;
	        } else {
	            $parameter = trim($parameter);
	            if ($strip_tags) {
	                $parameter = strip_tags($parameter);
	            }
	            $parameter = $this->mysql_escape_string($parameter);
	            return $parameter;
	        }
	    }


	
	public function actionView() { 
		// die("here");
		$user_id = '';
		if(isset(Yii::$app->user->identity->id)) {
			$user_id = Yii::$app->user->identity->id; 
		}
		
		// $project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		$project_id=$this->sanatizeParams(Yii::$app->getRequest()->getQueryParam('projectId'));  //modified by @Hemant Thakur
		// echo "<pre>";print_r($id);die;
		
		if($project_id == '') {
			return $this->redirect(['investor/index']);
		}

		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->one();	
		
		if(count($investor_project) == 0) {
			return $this->redirect(['investor/index']);
		}  
		
			$query = new Query;
			$query->select('m2, name')->from('yii_master_code')->where(['m1' => '1'])->orderBy('name');
			$command = $query->createCommand();
            $sectors = $command->queryAll(); 

            $query_compny = CompanyType::find();
	        $comp_type = $query_compny->orderBy('name')->all();
		
		return $this->render('projectview', [
			'comp_type' => $comp_type,
			'model' => $investor_project,
			'user_id' => $user_id,
			'sectors'=>$sectors
		]);  		 
 
	}

	public function actionAdd() {
		die("here");
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
			
			$cafid = $model->id;
			$serviceid = '';
			$userid = $user_id;
			$eventname = "New Project submited by investor"; // Can be "add", "update" , "delete"
			$notifytext = "New Project submited by investor";
			$datenotify = date('Y-m-d H:i:s');			
			$arr_param = array(
						'r'=>'notifications/createnotifications',
						'caf_id' => $cafid,
						'service_id' => $serviceid,
						'user_id' => $userid,
						't_event' => $eventname,
						'notification_detail' => $notifytext,
						'date_created' => $datenotify );
			
			$urlto_hit = "http://".$_SERVER['HTTP_HOST'].BaseUrl::base()."/index.php?";
			
			$urlto_hit .= http_build_query($arr_param,'','&');
			$json_reply = file_get_contents($urlto_hit) or die(print_r(error_get_last()));
			Yii::$app->getSession()->setFlash('success', 'Thank you for your interest! The project Details are shared with Dept. for approval. Once approved you will be able to avail services.'); 
            return $this->redirect(['investor/index']);

        }
		else {
				
			$query = new Query;
			$query->select('m2, name')->from('yii_master_code')->where(['m1' => '1'])->orderBy('name');
			$command = $query->createCommand();
            $sectors = $command->queryAll(); 

			$query_compny = CompanyType::find();
	        $comp_type = $query_compny->orderBy('name')->all();


			return $this->render('project', [
				'comp_type' => $comp_type,
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
