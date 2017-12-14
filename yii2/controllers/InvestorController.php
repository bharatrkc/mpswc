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

class InvestorController extends \yii\web\Controller { 

	public $layout = 'investorLayoutIspinia'; 

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

	

    public function actionContacts() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('contacts');

	}


    public function actionNotifications() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('notifications');

	}
  
    public function actionReports1() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('Reports1');

	}

    public function actionReports2() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('Reports2');

	}

    public function actionReports3() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('Reports3');

	}

    public function actionList() { 
 
	    $user_id = Yii::$app->user->identity->id;

		
		return $this->render('list');

	}
    public function actionTimeline() { 
 
	    $user_id = Yii::$app->user->identity->id;
		$project_id = Yii::$app->getRequest()->getQueryParam('id');

		$investor_project = InvestorProjects::findOne(['investor_id' => $user_id, 'id' => $project_id]);
	 
		$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail = $query->where(['investor_id' => $user_id, 'project_id' => $project_id])->all();
		 
		$caf = Caf::find()->where(['investor_id'=>$user_id, 'project_id'=>$project_id])->one();

 

		return $this->render('timeline', [
			'investor_project' => $investor_project,
			'investorProjectDetail' => $investorProjectDetail,
			'caf' => $caf
		]);

	} 

    public function actionIndex() { 
		
		return $this->redirect(['investor/dashboard']);
	    $user_id = Yii::$app->user->identity->id;
		
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id])->orderBy(['updated' => SORT_DESC])->all();

		$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail = $query->where(['investor_id' => $user_id])->all();
		$total_completed = 0;
		$incomplete = 0;
			
		$services = '';
		$services_map = array();
		foreach($investorProjectDetail as $investorproject_detail) {
			$investorProjectDetail_arr[$investorproject_detail->service_id] = $investorproject_detail;

			if($investorproject_detail->completed) { 
				$total_completed++;
			}
			else {
				if($investorproject_detail->status) { 
					$incomplete++;
				}
			}
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject_detail->service_id, 'status' => 'A'])->all();
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
			}
		}

		$rows = (new \yii\db\Query())
				->select(['id', 'project_id', 'user_id'])
				->from('yii_investor_service_document')
				->where(['user_id' => $user_id])
				->all();
		$cafStatus = array();
		foreach($rows as $val) {
			$project_id_ = $val['project_id'];
			$cafStatus[$project_id_] = $project_id_ ;
		}
	//-----------
	 
		$any_proj_approved = 0;
		foreach($investor_project as $row) {
			if($row->department_approval) {
				$any_proj_approved = 1; break;
			}
		}
	//------------------------------------
		//$this->enableCsrfValidation = false;		
        if (Yii::$app->request->isPost) {
			$project_id = $_POST['project']; 
			$type = $_POST['type']; 
            
			if($type == 'service') {
			   $url = 'investor/'.$type;
			}
			else {
			   $url = 'caf/'.$type;
			}

			if(isset($_POST['services'])) {
				$services = $_POST['services']; 
				foreach($services as $service) {
					$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service]);
					$model->status = '2'; 
					$model->updated_by = $user_id;
					$model->save();
				}

				return $this->redirect([$url, 'project_id' => $project_id]);
			}
			else {	
				return $this->redirect([$url, 'project_id' => $project_id]);
			}
		}

		return $this->render('dashboard', [
				'investor_projects' => $investor_project,
				'any_proj_approved' => $any_proj_approved,		
				'investorProjectDetail' => $investorProjectDetail,
				'total_completed' => $total_completed,
				'incomplete' => $incomplete,
				'cafStatus' => $cafStatus,		
				'services' => $services_map,		
		]);

	}
		
	

    public function actionDashboardnew() { 

		$this->layout = 'investorLayoutIspiniaDashboard';
 
	    $user_id = Yii::$app->user->identity->id;
		
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id])->orderBy(['updated' => SORT_DESC])->all();

		$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail = $query->where(['investor_id' => $user_id])->all();
		$total_completed = 0;
		$incomplete = 0;
			
		$services = '';
		$services_map = array();
		foreach($investorProjectDetail as $investorproject_detail) {
			$investorProjectDetail_arr[$investorproject_detail->service_id] = $investorproject_detail;

			if($investorproject_detail->completed) { 
				$total_completed++;
			}
			else {
				if($investorproject_detail->status) { 
					$incomplete++;
				}
			}
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject_detail->service_id, 'status' => 'A'])->all();
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
			}
		}

		$rows = (new \yii\db\Query())
				->select(['id', 'project_id', 'user_id'])
				->from('yii_investor_service_document')
				->where(['user_id' => $user_id])
				->all();
		$cafStatus = array();
		foreach($rows as $val) {
			$project_id_ = $val['project_id'];
			$cafStatus[$project_id_] = $project_id_ ;
		}
	//-----------
	 
		$any_proj_approved = 0;
		foreach($investor_project as $row) {
			if($row->department_approval) {
				$any_proj_approved = 1; break;
			}
		}
	//------------------------------------
		//$this->enableCsrfValidation = false;		
        if (Yii::$app->request->isPost) {
			$project_id = $_POST['project']; 
			$type = $_POST['type']; 
            
			if($type == 'service') {
			   $url = 'investor/'.$type;
			}
			else {
			   $url = 'caf/'.$type;
			}

			if(isset($_POST['services'])) {
				$services = $_POST['services']; 
				foreach($services as $service) {
					$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service]);
					$model->status = '2'; 
					$model->updated_by = $user_id;
					$model->save();
				}

				return $this->redirect([$url, 'project_id' => $project_id]);
			}
			else {	
				return $this->redirect([$url, 'project_id' => $project_id]);
			}
		}

		return $this->render('dashboard', [
				'investor_projects' => $investor_project,
				'any_proj_approved' => $any_proj_approved,		
				'investorProjectDetail' => $investorProjectDetail,
				'total_completed' => $total_completed,
				'incomplete' => $incomplete,
				'cafStatus' => $cafStatus,		
				'services' => $services_map,		
		]); 

	}
	
     public function actionDashboard() { 

		$this->layout = 'investorLayoutIspiniaDashboard';
        $user_id = Yii::$app->user->identity->id;
		$query = InvestorProjects::find();  
		$investor_project = $query->where(['investor_id' => $user_id])->orderBy(['updated' => SORT_DESC])->all();

		$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail = $query->where(['investor_id' => $user_id])->all();
		$total_completed = 0;
		$incomplete = 0;
			
		$services = '';
		$services_map = array();
		$project_status = array();
		foreach($investorProjectDetail as $investorproject_detail) {
			$investorProjectDetail_arr[$investorproject_detail->service_id] = $investorproject_detail;
			
			$project_id_ = $investorproject_detail->project_id;
			

			if($investorproject_detail->completed) { 
				$total_completed++;
				$project_status[$project_id_]['applied'][] = 1; 
			}
			else {
				if($investorproject_detail->status) { 
					$incomplete++;
					$project_status[$project_id_]['incomplete'][]=1; 
				}
			}
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject_detail->service_id, 'status' => 'A'])->all();
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
			}
		}
 

		$rows = (new \yii\db\Query())
				->select(['id', 'project_id', 'user_id'])
				->from('yii_investor_service_document')
				->where(['user_id' => $user_id])
				->all();
		$cafStatus = array();
		foreach($rows as $val) {
			$project_id_ = $val['project_id'];
			$cafStatus[$project_id_] = $project_id_ ;
		}
	//-----------
		$any_proj_approved = 0;
		foreach($investor_project as $row) {
			if($row->department_approval) {
				$any_proj_approved = 1; break;
			}
		}
	//------------------------------------ 
		return $this->render('dashboardnew', [
				'investor_projects' => $investor_project,
				'any_proj_approved' => $any_proj_approved,		
				'investorProjectDetail' => $investorProjectDetail,
				'total_completed' => $total_completed,
				'incomplete' => $incomplete,
				'cafStatus' => $cafStatus,		
				'services' => $services_map,	
				'project_status' => $project_status
		]);
	}
        
    public function actionProjectnew() {

		$this->layout = 'investorLayoutIspiniaDashboard';
		
		$user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		
        $query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all(); 

		$investorproject_detail = array();
		foreach($investor_project as $investorProject) {
			$query = investorProjectDetail::find();
			$investorproject_detail = $query->where(['project_id' => $project_id])->all(); 
		} 
		
		$services = '';
		$services_map = array();

		foreach($investorproject_detail as $investorprojectdetail) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorprojectdetail->service_id, 'status' => 'A','integration_flag'=>'1'])->all();
			
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
				$services_map[$id]['time_limit'] = $services[0]->time_limit;
				$services_map[$id]['sla'] = $services[0]->sla;
			}
		}
		 
        return $this->render('projectdashboard', [
            'investor_project' => $investor_project,
            'investorproject_detail' => $investorproject_detail,
            'services' => $services_map,
        ]);
	} 
        
	public function actionRegister() {

		if (!Yii::$app->user->isGuest) {
			// Yii::$app->getSession()->setFlash('success', 'You are already logged in user'); 
             return $this->goHome();
        }

		$user = new User(); 
		$userprofile = new UserProfile(); 

		if (Yii::$app->request->isAjax && $userprofile->load(Yii::$app->request->post())) { 
			if (isset($_POST['UserProfile']['adhaar_number'])) {
					Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
					return \yii\widgets\ActiveForm::validate($userprofile, 'adhaar_number');
			} else {
				return false;
			}
		}
                
		if ($user->load(Yii::$app->request->post()) && $userprofile->load(Yii::$app->request->post())) { 
			$isValid = $user->validate();
			$isValid = $userprofile->validate() && $isValid;

			if ($isValid) {
					
					$user->otp = rand(100000,999999);
					$user->username = $user->email;

					$user->save(false);
					$user_id = $user->getPrimaryKey(); 
					
					if($user_id) {

						$userprofile->user_id = $user_id;
						$userprofile->save(false); 

						 // the following three lines were added:
						$auth = \Yii::$app->authManager;
						$authorRole = $auth->getRole('investor');
						$auth->assign($authorRole, $user->getId());

 
						$query = new \yii\db\Query; 
						$sql = 'insert into yii_users_roles (user_id, role_id) values("'.$user_id.'", "2")';
						//$query->createCommand($sql)->execute();
						Yii::$app->db->createCommand($sql)->execute();
						
						//Yii::$app->getSession()->setFlash('success', 'You are registered and can login');
						//return $this->redirect(['site/login']);
						Yii::$app->getSession()->setFlash('success', 'You are registered, please enter the OTP - ' . $user->otp);
						return $this->redirect(['site/otp']);

					}
					else {
						Yii::$app->getSession()->setFlash('success', 'Error to save user model<br />'.(serialize($user->getErrors())));

						return $this->render('register', [
									'user' => $user,
									'userprofile' => $userprofile,
								]); 
						}
			}
		}

		$rows = (new \yii\db\Query())
					->select(['country_id', 'name'])
					->from('yii_country')
					->where(['status' => 'A'])
					->all();
		$countries = array();
		foreach($rows as $val) {
			$country_id = $val['country_id'];
			$name = $val['name'];
			$countries[$country_id] = $name ;
		}

		$rows = (new \yii\db\Query())
					->select(['state_id', 'name'])
					->from('yii_state')
					->where(['status' => 'A'])
					->all();
		$states = array();
		foreach($rows as $val) {
			$state_id = $val['state_id'];
			$name = $val['name'];
			$states[$state_id] = $name ;
		}

		return $this->render('register', [
			'user' => $user,
			'userprofile' => $userprofile,
			'countries' => $countries,
			'states' => $states,
		]);
	}

	public function actionGetstates() {  


		if($id = Yii::$app->request->get('id')) {  

			$rows = (new \yii\db\Query())
						->select(['state_id', 'name'])
						->from('yii_state')
						->where(['status' => 'A', 'country_id' => $id])
						->all();

			$states = array();
			foreach($rows as $val) {
				$state_id = $val['state_id'];
				$name = $val['name'];
				$states[$state_id] = $name ;
			}
			

			echo "<option value=''>-Select State-</option>";
			if(count($states) > 0){
				foreach($states as $id=>$state) {

					echo "<option value='" . $id . "'>" . $state . "</option>";
				}
			}
		}
		else {
				echo "<option>-</option>";
		}

 
    }

		
	
	public function actionProfile() {
		
		$user = new User(); 
		$userprofile = new UserProfile(); 
	    $user_id = Yii::$app->user->identity->id;
		
		$user = User::findOne(['id' => $user_id]);
		$userprofile = UserProfile::findOne(['user_id' => $user_id]);

		if ($user->load(Yii::$app->request->post()) && $userprofile->load(Yii::$app->request->post())) { 
			$isValid = $user->validate();
			$isValid = $userprofile->validate() && $isValid;

			if ($isValid) { 
					$user->save(false);
					$user_id = $user->getPrimaryKey();  
					if($user_id) {

						$userprofile->user_id = $user_id;
						$userprofile->save(false);  
					}
					else {
						Yii::$app->getSession()->setFlash('success', 'Error to save user model<br />'.(serialize($user->getErrors())));

						return $this->render('profile', [
									'user' => $user,
									'userprofile' => $userprofile,
								]); 
						}
			}
		}

		return $this->render('profile', [
			'user' => $user,
			'userprofile' => $userprofile,
		]);
	}
 
	
	public function actionService() {

		$this->layout = 'investorLayoutIspiniaCafservices';

	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
		$serviceid = Yii::$app->getRequest()->getQueryParam('serviceid');
		$industry_status = Yii::$app->getRequest()->getQueryParam('type');

		//check if need to redirect to CAF page 
		$flag = 1;  
		$model = Caf::find()->where(['investor_id'=>$user_id, 'project_id'=>$project_id])->one();	
 		if($model['id']) {
			$flag = 0;    
		}
		else {
			$flag = 1; 
		}
       
		if($flag == 1) {
			return $this->redirect(['caf/index', 'projectId' => $project_id, 'type' => $industry_status]);
		}

		
		if($serviceid == '') {
			$investorProjectDetail = new InvestorProjectDetail();  
			$query = InvestorProjectDetail::find();  
			$investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2','completed'=> null])->orderBy(['id' => SORT_ASC])->all();

			if(isset($investorProjectDetail[0]['service_id'])) {
				$serviceid = $investorProjectDetail[0]['service_id'];
			}
			else {
				return $this->redirect(['caf/index', 'projectId' => $project_id, 'type' => $industry_status]);
			} 
		}


		//check if need to redirect to doc upload page 
	/*	$check_complete = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all();
		$flag = 1;
		foreach($check_complete as $complete) {
			if($complete['completed'] == 0){
				$flag = 0;
				break;
			}
		}
		if($flag == 1) {
			return $this->redirect(['caf/upload', 'project_id' => $project_id, 'type' => $industry_status]);
		}

*/
		if($project_id == '') {
			Yii::$app->getSession()->setFlash('success', 'CAF id missing'); 
			return $this->redirect(['investor/index']);
		}
 
		$investorProjectDetail = new InvestorProjectDetail();  
        $query = InvestorProjectDetail::find();  
        $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all();
	    //$investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'type' => $industry_status])->orderBy(['id' => SORT_ASC])->all();
		
		$services = '';
		$services_map = array(); 
		$investorProjectDetail_arr = array();
		foreach($investorProjectDetail as $investorproject) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject->service_id])->all(); 

			$id = $services[0]->id;
			$services_map[$id]['name'] = $services[0]->services;
			$services_map[$id]['short_name'] = $services[0]->short_name;
			$services_map[$id]['department'] = $services[0]->department;

			$services_map[$id]['json'] = $investorproject->json;

			$investorProjectDetail_arr[$investorproject->service_id] = $investorproject; 
		}
 
		if (Yii::$app->request->post()) {

			$current_tab = $_POST['current_tab'];
			$service_id = $_POST['service_id'];
			$tabnum = $_POST['tabnum'];

			$values['tab'.$current_tab] = $_POST['tab'.$current_tab];
			
			if($current_tab > 1) {				
				if($services_map[$service_id]['json']) { 

					$json=json_encode(array_merge(json_decode($services_map[$service_id]['json'], true), $values));
				} 
			}
			else { 
				$json = json_encode($values);
			}
			 
			$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service_id]);
			$model->investor_id = $user_id;
			$model->json = $json; 
			/*
			//if tabs
			if($tabnum == 'Submit') {
				$model->completed = 1; 
			}*/
			//no tabs then
			$model->completed = 1; 
			$model->current_tab = $current_tab; 
			$model->updated_by = $user_id;
			$model->save();
			
			//check if need to redrect to doc upload page
			if($model->completed == 1) {

				$check_complete = new InvestorProjectDetail();  
				$query = InvestorProjectDetail::find();  
				$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all(); 
				//$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id])->orderBy(['id' => SORT_ASC])->all(); 
				
				$flag = 1;
				foreach($check_complete as $complete) {
					if($complete['completed'] == 0){
						$flag = 0;
						break;
					}
				}

				if($flag == 1) {
					return $this->redirect(['caf/upload', 'project_id' => $project_id, 'type' => $industry_status]);
				}			
			}


			return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status]);
		} 

		return $this->render('service', [ 
			'investorProjectDetail' => $investorProjectDetail,
			'services' => $services_map,
			'investorProjectDetail_arr' => $investorProjectDetail_arr,
			'serviceid' => $serviceid,
			'industry_status' => $industry_status
		]);
	}

	
	public function actionPreoperationalService() {
 
	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
		$serviceid = Yii::$app->getRequest()->getQueryParam('serviceid');

		//check if need to redirect to CAF page 
		$flag = 1;  
		$model = Caf::find()->where(['investor_id'=>$user_id, 'project_id'=>$project_id])->one();	
 		if($model['id']) {
			$flag = 0;    
		}
		else {
			$flag = 1; 
		}
       
		if($flag == 1) {
			return $this->redirect(['caf/index', 'projectId' => $project_id]);
		}	


		//check if need to redirect to doc upload page 
		$check_complete = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all(); 
				
		$flag = 1;
		foreach($check_complete as $complete) {
			if($complete['completed'] == 0){
				$flag = 0;
				break;
			}
		}

		if($flag == 1) {
			return $this->redirect(['caf/upload', 'project_id' => $project_id]);
		}	
		
 

		if($project_id == '') {
			Yii::$app->getSession()->setFlash('success', 'CAF id missing'); 
			return $this->redirect(['investor/index']);
		}
 
		$investorProjectDetail = new InvestorProjectDetail();  
        $query = InvestorProjectDetail::find();  
        $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2', 'type'=> 'pre-operational'])->orderBy(['id' => SORT_ASC])->all();
		
		$services = '';
		$services_map = array(); 
		$investorProjectDetail_arr = array();
		foreach($investorProjectDetail as $investorproject) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject->service_id])->all(); 

			$id = $services[0]->id;
			$services_map[$id]['name'] = $services[0]->services;
			$services_map[$id]['short_name'] = $services[0]->short_name;
			$services_map[$id]['department'] = $services[0]->department;

			$services_map[$id]['json'] = $investorproject->json;

			$investorProjectDetail_arr[$investorproject->service_id] = $investorproject; 
		}
 
		if (Yii::$app->request->post()) {

			$current_tab = $_POST['current_tab'];
			$service_id = $_POST['service_id'];
			$tabnum = $_POST['tabnum'];

			$values['tab'.$current_tab] = $_POST['tab'.$current_tab];
			
			if($current_tab > 1) {				
				if($services_map[$service_id]['json']) { 

					$json=json_encode(array_merge(json_decode($services_map[$service_id]['json'], true), $values));
				} 
			}
			else { 
				$json = json_encode($values);
			}
			 
			$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service_id]);
			$model->investor_id = $user_id;
			$model->json = $json;

			if($tabnum == 'Submit') {
				$model->completed = 1; 
			}

			$model->current_tab = $current_tab; 
			$model->updated_by = $user_id;
			$model->save();
			
			//check if need to redrect to doc upload page
			if($model->completed == 1) {

				$check_complete = new InvestorProjectDetail();  
				$query = InvestorProjectDetail::find();  
				$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all(); 
				
				$flag = 1;
				foreach($check_complete as $complete) {
					if($complete['completed'] == 0){
						$flag = 0;
						break;
					}
				}

				if($flag == 1) {
					return $this->redirect(['caf/upload', 'project_id' => $project_id]);
				}			
			}

			return $this->redirect(['caf/preoperational-service', 'project_id' => $project_id]);
		}
 
		return $this->render('service', [ 
			'investorProjectDetail' => $investorProjectDetail,
			'services' => $services_map,
			'investorProjectDetail_arr' => $investorProjectDetail_arr,
			'serviceid' => $serviceid
		]);
	}

	

	public function check_security($post_wizardForm, $_questions, $_answer_ids, $_answers, $_answers_dependent_questions) {


		foreach($_questions as $ques_id=>$_parent_id ) {
			
			if(!in_array($ques_id, $_answers_dependent_questions)) {
				if(!isset($post_wizardForm[$ques_id])) { 
					echo '---'.$ques_id.'---Validation: Required value'; exit; 
				}
			}

		}


		foreach($post_wizardForm as $ques_id => $answer_id) {
			if(array_key_exists($ques_id, $_questions)) { 
						
				if(is_array($answer_id)) {
					foreach($answer_id as $_ans_id) {
						if(in_array($_ans_id, $_answer_ids)) {  
							if($_answers[$_ans_id]['question_id'] != $ques_id) { 
								echo 'Security Error: 11 question and anser id didn\'t match'; exit;
							}
						}
						else {
							echo 'Security Error: 22 wrong answer not in the list'; exit; 
						}
					}
				}
				else {
					if($answer_id != '') {
						if(in_array($answer_id, $_answer_ids)) {  

							if($_answers[$answer_id]['question_id'] != $ques_id) { 
								echo 'Security Error: 33 question and anser id didn\'t match'; exit;
							}

						}
						else { 
							echo 'Security Error: 44 wrong answer not in the list'; exit; 
						}
					}
				}

			}
			else { 
				echo 'Security Error:55 wrong question id'; exit;
			} 
					  
		}
					  
	}
 

}
