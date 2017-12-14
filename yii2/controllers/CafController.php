<?php
namespace app\controllers;
use Yii;
use app\models\Caf;
use app\models\CafSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Precho;
use app\models\User;
use app\models\UserProfile;
use app\models\InvestorProjects;
use app\models\InvestorProjectDetail;
use app\models\Services;
use app\models\ServiceBuildingPlanApprovalByAkvn; 
use app\models\ServiceNocFromFireDepartment; 
use app\models\ServiceElectricityConnectionHt; 
use app\models\ServiceWaterConnectionByAkvn; 
use app\models\ServiceRegistrationOfShopAndCommercialEstablishment; 
use app\models\ServiceConsentToEstablish; 
use app\models\ServiceAuthorizationUnderHazardousWasteRules; 
use app\models\ServiceFactoryBuildingPlanApproval;
use app\models\CompanyType;
use app\models\MmLineOfActivity;

use yii\web\UploadedFile;

use app\models\UploadForm;   
/**
 * CafController implements the CRUD actions for Caf model.
 */
class CafController extends Controller
{
	//public $layout = 'investorLayout';
	//investorLayoutIspiniaCafservices
	public $layout = 'investorLayoutIspinia';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
    public function actionIndex() {

		$this->layout = 'investorLayoutIspinia';
		$employment = '';
		$land = '';

	    $user_id = Yii::$app->user->identity->id;
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		$industry_type = Yii::$app->getRequest()->getQueryParam('type');

		$disabled = 0;
		//-------------------
		$request = Yii::$app->request;
		$project_id = $request->get('projectId');
		$query = InvestorProjects::find();
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all();
		if(count($investor_project) == 0) {
			 Yii::$app->getSession()->setFlash('success', 'Project is not selected.');
			 return $this->redirect(['investor/index']);
		}
        $investor_projects_details_vals = $investor_project[0];

		//--get users 
		$query = UserProfile::find();   
        $user_profile = $query->where(['user_id' => $user_id])->all();

		$query_compny = CompanyType::find();
        $comp_type = $query_compny->orderBy('name')->all();


        $user_profile_vals = $user_profile[0];
		//------------
		$model = Caf::find()->where(['investor_id'=>$user_id, 'project_id'=>$project_id])->one();

		if($model['id']) { 
			$disabled = 1;
		}
		else {
			$model = new Caf();

			 $employment = $investor_projects_details_vals['employment'];
			 $land = $investor_projects_details_vals['land'];

			 $model->unit_name = $investor_projects_details_vals['project'];
			 $model->proposed_site_area_for_development = $investor_projects_details_vals['land'];
			 $model->constitution = $investor_projects_details_vals['company']; 
			 $model->contact_name = $investor_projects_details_vals['investor_name']; 
			 $model->contact_email = $investor_projects_details_vals['email'];
			 $model->contact_designation = $investor_projects_details_vals['designation'];
			 $model->contact_mobile = $investor_projects_details_vals['mobile'];
			 $model->project_name = $investor_projects_details_vals['project'];
			 $model->sector = $investor_projects_details_vals['sector'];
			 $model->proposed_site_district = $investor_projects_details_vals['district'];
			 $model->pan_number = $user_profile_vals['pan_number'];

			 
			 $model->applicant_aadhar_no = $user_profile_vals['adhaar_number'];
		}

		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) { 
			if (isset($_POST['Caf']['applicant_aadhar_no'])) {

					Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
					return \yii\widgets\ActiveForm::validate($model, 'applicant_aadhar_no');

			} 
			else {
				return false;
			}
		}
		
		
		//$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all();
		// $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'type' => $industry_type])->orderBy(['id' => SORT_ASC])->all(); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			if(isset($investorProjectDetail[0]['service_id'])) {
				$service_id_ = $investorProjectDetail[0]['service_id'];
			}
			return $this->redirect(['caf/services', 'project_id' => $project_id]);
			//return $this->redirect(['investor/service', 'project_id' => $project_id, 'serviceid' => $service_id_]);
        }
		else { 

			$services = '';
			$services_map = array();  
			foreach($investorProjectDetail as $investorproject) { 
				$query = Services::find();  
				$services = $query->where(['id' => $investorproject->service_id])->all(); 

				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['short_name'] = $services[0]->short_name;
				$services_map[$id]['department'] = $services[0]->department;  
				$services_map[$id]['service_model'] = $services[0]->service_model;  
				$services_map[$id]['completed'] = $investorproject->completed;  
			}

			return $this->render('caf', [
					'model' => $model,
					'comp_type' => $comp_type,
					'investor_project' => $investor_project,
					'disabled' => $disabled,
					'investorProjectDetail' => $investorProjectDetail,
					'services' => $services_map,
					'industry_status' => $industry_type,
					'employment' => $employment,
					'land' => $land
			]);
		}
    }
 
 
	public function actionLineofactivities() { 

            $sector = ($_POST['id']); 

        $rows = MmLineOfActivity::find()->where(['sector'=>$sector])->all(); 
        echo "<option>Select</option>";
        
		if(isset($rows)) {
			if(count($rows)>0){
				foreach($rows as $row){
					echo "<option value='$row->line_of_activity'>$row->line_of_activity</option>";
				}
			}
			else{
				echo "<option>No options available</option>";
			}
		}
 
    }
	
	public function actionLineofactivitiespol() {

            $lid = ($_POST['id']); 

        $rows = MmLineOfActivity::find()->where(['id'=>$lid])->one();
		if(isset($rows)) {
			if(count($rows)>0){
					echo $rows->pollution_mark;
			}
			else{
				echo "No Category";
			}
		}
   
 
    }
	

    public function actionCafservices() {
        /*

        $request = Yii::$app->request;
		$post = $request->post();
    	if(isset($_POST['services']))
    	{
    		print_r($_POST['services']);
    		print_r($post);
			exit();
    	}

        */

 
	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		
        $query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all(); 

		$investorproject_detail = array();
		foreach($investor_project as $investorProject) {
			$query = investorProjectDetail::find();
			$investorproject_detail = $query->where(['project_id' => $project_id])->orderBy(['type' => SORT_ASC])->all();
		} 
		
		$services = '';
		$services_map = array();

		foreach($investorproject_detail as $investorprojectdetail) {
			$query = Services::find();  
			$services = $query->where(['id' => $investorprojectdetail->service_id, 'status' => 'A'])->all(); 
			
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
			}
		}
		
		$query_all = new \yii\db\Query;
					$query_all->select("yii_services.* ")
							->from('yii_answer_services_mapping')
							->join(	'INNER JOIN',
									'yii_services',
									'yii_services.id = yii_answer_services_mapping.service_id');

					$query_all->where(['yii_answer_services_mapping.answer_id'=>json_decode($investor_project[0]->answer_json),
						'yii_services.integration_flag' => '0',
						'yii_services.status' => 'A']);

					$command = $query_all->createCommand();
					//echo $command->getRawSql(); exit();
					
					$servicelist_all = $command->queryAll();
					
					//print_r($servicelist_all);

        $request = Yii::$app->request;
		$post = $request->post();
		if (count($post)) {
			if(isset($post['services'])) {

				//print_r($post['services']);
				//exit();

				$services = $post['services']; 				
				foreach($services as $service) {
					$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service]);
					$model->status = '2'; 
					$model->updated_by = $user_id;
					if($model->validate() && $model->save())
						{
							//echo "test inside if";
							//exit();
						}
						else
						{
							$err="";
        		// echo "<pre>";print_r($model->geterrors());die;

        			foreach ($model->geterrors() as $field => $errors) {
			        			foreach ($errors as $key => $errs) {
			        				echo $err.="'" . $field . "' " .$errs;
			        			}
			        		}
        				Yii::$app->getSession()->setFlash('error', "Please resolove following issues: ". $err);
						}
						//exit();
						}
				return $this->redirect(['caf/services', 'project_id' => $project_id]);
				//return $this->redirect(['investor/service', 'project_id' => $project_id]);
			}
			else {
				return $this->redirect(['caf/services', 'project_id' => $project_id]);
				//return $this->redirect(['investor/service', 'project_id' => $project_id]);
			}
		}
        return $this->render('cafservices', [
            'investor_project' => $investor_project,
            'investorproject_detail' => $investorproject_detail,
            'services' => $services_map,
            'services_all' => $servicelist_all,
        ]);
    }
/***********************************************************************************************/

  public function actionServicesManual() {
        /*

        $request = Yii::$app->request;
		$post = $request->post();
    	if(isset($_POST['services']))
    	{
    		print_r($_POST['services']);
    		print_r($post);
			exit();
    	}

        */

 
	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		
        $query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all(); 

		$investorproject_detail = array();
		foreach($investor_project as $investorProject) {
		//	$query = investorProjectDetail::find();
		//	$investorproject_detail = $query->where(['project_id' => $project_id])->orderBy(['type' => SORT_ASC])->all();
			
		$query_all = new \yii\db\Query;
					$query_all->select("yii_investor_project_detail.*,yii_services.id as sid,yii_services.services as sname,yii_services.industry_status as industry_status ")
							->from('(select * from yii_investor_project_detail where project_id='.$project_id.') as yii_investor_project_detail')
							->join(	'RIGHT JOIN',
									'yii_services',
									'yii_services.id = yii_investor_project_detail.service_id');
					
					$query_all->where([
						'yii_services.integration_flag' => 1,
						
						'yii_services.status' => 'A']);

					$command = $query_all->createCommand();
					//echo $command->getRawSql(); exit();
					
					$investorproject_detail = $command->queryAll();
					//echo "<pre>";
					//print_r($investorproject_detail);
					//echo "</pre>";
					//exit();
		}
		
		$services = '';
		$services_map = array();
$x = 1;
		foreach($investorproject_detail as $investorprojectdetail) {
			$query = Services::find();
			$services = $query->where(['id' => $investorprojectdetail['sid'], 'status' => 'A'])->all();
			
			if(isset($services[0])) {
				//echo "<br/>";

				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;
			}
		}

		
		$query_all = new \yii\db\Query;
					$query_all->select("yii_services.* ")
							->from('yii_services');
						/*	->join(	'INNER JOIN',
									'yii_services',
									'yii_services.id = yii_answer_services_mapping.service_id');
						*/
					$query_all->where([
						'yii_services.integration_flag' => '0',
						'yii_services.status' => 'A']);

					$command = $query_all->createCommand();
					//echo $command->getRawSql(); exit();
					
					$servicelist_all = $command->queryAll();
					//echo "<pre>";
					//print_r($servicelist_all);
					//echo "</pre>";
	        $request = Yii::$app->request;
			$post = $request->post();
			if (count($post)) {
				if(isset($post['services'])) {

				//print_r($post['services']);
				//exit();

				$services = $post['services'];
				//echo "</pre>";
				//print_r($services);
				//echo "<pre>";
				//exit();
				foreach($services as $service) {
					$model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service]);
					
					if(count($model)>0)
					{
					$model->status = '2';
					$model->updated_by = $user_id;
					if($model->validate() && $model->save())
						{
							//echo "test inside if";
							//exit();
						}
						else
						{
							$err="";
        		// echo "<pre>";print_r($model->geterrors());die;

        			foreach ($model->geterrors() as $field => $errors) {
			        			foreach ($errors as $key => $errs) {
			        				echo $err.="'" . $field . "' " .$errs;
			        			}
			        		}
        				Yii::$app->getSession()->setFlash('error', "Please resolove following issues: ". $err);
						}
					}
					else
					{

							$model = new InvestorProjectDetail();
							$model->investor_id = $user_id;
							$model->service_id = $service;
							$model->project_id = $project_id;
							$model->status = '2';

							$queryx = Services::find();
							$servicesx = $queryx->where(['id' => $service, 'status' => 'A'])->all();
							//echo "<pre>";
							//print_r($servicesx);
							//exit();
							if($servicesx[0]['industry_status']=='Pre Establishment')
							{
							$model->type = 'pre-establishment';								
							}
							else if($servicesx[0]['industry_status']=='Pre Operational')
							{
							$model->type = 'pre-operational';
							}
							/*
							echo "<pre>";
							print_r($model);
							echo "</pre>"; */
							$model->created_by = $user_id;

							if($model->validate() && $model->save())
							{
								//echo "test inside if";
								//exit();
							}
							else
							{
								$err="";
	        				 //echo "<pre>";print_r($model->geterrors());die;

	        			foreach ($model->geterrors() as $field => $errors) {
				        			foreach ($errors as $key => $errs) {
				        				$err.="'" . $field . "' " .$errs;
				        			}
				        		}
				        	//exit();
	        				Yii::$app->getSession()->setFlash('error', "Please resolove following issues: ". $err);
							}
					}
				}
				return $this->redirect(['caf/services', 'project_id' => $project_id]);
				//return $this->redirect(['investor/service', 'project_id' => $project_id]);
			}
			else {
				return $this->redirect(['caf/services', 'project_id' => $project_id]);
				//return $this->redirect(['investor/service', 'project_id' => $project_id]);
			}
		}
        return $this->render('cafservicesmanual', [
            'investor_project' => $investor_project,
            'investorproject_detail' => $investorproject_detail,
            'services' => $services_map,
            'services_all' => $servicelist_all,
        ]);
    }

/***********************************************************************************************/
    public function actionUpload() {
		
	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
		$industry_type = Yii::$app->getRequest()->getQueryParam('type');
		$industry_status = Yii::$app->getRequest()->getQueryParam('type');
		$documents = array();
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
		
		//-----CAF docs
		$document_list = (new \yii\db\Query())
					->select(['id', 'title'])
					->from('yii_sevice_document_list')
					->where(['category' => 'CAF'])
					->all();
		foreach($document_list as $document) {
					$id = $document['id'];
					$title = $document['title'];
					$documents[$id] = $title;
		}
		//-----CAF docs

        $model = new UploadForm();
		$check_docs = new InvestorProjectDetail(); 
		$query = InvestorProjectDetail::find();  
		$check_docs = $query->where(['project_id' => $project_id, 'investor_id' => $user_id, 'completed'=> '1'])->orderBy(['id' => SORT_ASC])->all();
		
		foreach($check_docs as $docs) {
			$rows = (new \yii\db\Query())
					->select(['service_id', 'document_id'])
					->from('yii_services_documents_mapping')
					->where(['service_id' => $docs['service_id']])
					->all();
			foreach($rows as $mapping) {
				$document_list = (new \yii\db\Query())
					->select(['id', 'title'])
					->from('yii_sevice_document_list')
					->where(['id' => $mapping['document_id']])
					->all();
				foreach($document_list as $document) {
					$id = $document['id'];
					$title = $document['title'];
					$documents[$id] = $title;
				}
			}
		}

	// echo '<pre>'; print_r($_POST); exit;
        if (Yii::$app->request->isPost) {  

				if(!is_dir('uploads')) {				  
					mkdir('uploads');				
			    } 
				if(!is_dir('uploads/'.$user_id)) {				  
					mkdir('uploads/'.$user_id);		
			    } 
				if(!is_dir('uploads/'.$user_id.'/'.$project_id)) {				  
					mkdir('uploads/'.$user_id.'/'.$project_id);		
			    }

			
			  $k = 0;
              $upload_files = UploadedFile::getInstances($model, 'files');
			  foreach($upload_files as $key => $file) {
				  
				 $count = 0;
				 foreach($_FILES['UploadForm']['name']['files'] as $key => $file) {
						if($count == $k){
							$doc_id = $key;
							break;
						}
				 }
				 $k++;

				 { 

					foreach ($upload_files as $file) {

						$file->saveAs('uploads/' . $user_id . '/' . $project_id . '/' . $file->baseName . '.' . $file->extension);

						$query = new \yii\db\Query; 
						$sql = 'insert into yii_investor_service_document (	service_id, project_id, path, user_id) values("'.$doc_id.'", "'.$project_id.'", "'.'uploads/'.$user_id.'/'.$project_id.'/' . $file->baseName . '.' . $file->extension.'", "'.$user_id.'")';

						Yii::$app->db->createCommand($sql)->execute();
					}
					
					Yii::$app->getSession()->setFlash('success', 'Files upoaded successfully');
					return $this->redirect(['investor/index']);
				}
				/*else { 
					$errors = $model->errors;
					print_r($errors); exit;
				}*/
			}
        }

		$investorProjectDetail = new InvestorProjectDetail();
        $query = InvestorProjectDetail::find();
        $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all();
	   // $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'type' => $industry_status])->orderBy(['id' => SORT_ASC])->all();
		
		$services = '';
		$services_map = array();  
		foreach($investorProjectDetail as $investorproject) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject->service_id])->all(); 

			$id = $services[0]->id;
			$services_map[$id]['name'] = $services[0]->services;
			$services_map[$id]['short_name'] = $services[0]->short_name;
			$services_map[$id]['department'] = $services[0]->department;  
			$services_map[$id]['service_model'] = $services[0]->service_model;  
			$services_map[$id]['completed'] = $investorproject->completed;  
		}

 		
		$investorProjectDetail_new = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail_data = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id])->orderBy(['id' => SORT_ASC])->all(); 
		

        return $this->render('upload', [
			'model' => $model,
			'documents' => $documents,
			'investorProjectDetail' => $investorProjectDetail,
			'services' => $services_map, 
			'investorProjectDetail_data' => $investorProjectDetail_data,
			'industry_status' => $industry_status,
		]);
    }
	
	public function actionServices() {

	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
		$serviceid = Yii::$app->getRequest()->getQueryParam('serviceid');
		$industry_status = Yii::$app->getRequest()->getQueryParam('type');

		if($industry_status == '')
			$industry_status = 'pre-establishment'; 

		$disabled = 0;
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
			if($complete['completed'] != 1){
				$flag = 0;
				break;
			}
		}

		if($flag == 1) {
			$action = Yii::$app->getRequest()->getQueryParam('action');
			if($action != 'view') {
				return $this->redirect(['caf/upload', 'project_id' => $project_id]);
			}
		}
 

		if($project_id == '') {
			Yii::$app->getSession()->setFlash('success', 'project id missing'); 
			return $this->redirect(['investor/index']);
		}
		

		//------------------- 
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all();
		if(count($investor_project) == 0) { 
			 Yii::$app->getSession()->setFlash('success', 'Project is not selected.'); 
			 return $this->redirect(['investor/index']);
		} 
        $investor_projects_details_vals = $investor_project[0]; 

		//-------------------------------
 
		$investorProjectDetail = new InvestorProjectDetail();  
        $query = InvestorProjectDetail::find();  
        $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2'])->orderBy(['id' => SORT_ASC])->all();
	   //$investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'type' => $industry_status])->orderBy(['id' => SORT_ASC])->all();

		
		$services = '';
		$services_map = array();  
		foreach($investorProjectDetail as $investorproject) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject->service_id])->all(); 

			$id = $services[0]->id;
			$services_map[$id]['name'] = $services[0]->services;
			$services_map[$id]['short_name'] = $services[0]->short_name;
			$services_map[$id]['department'] = $services[0]->department;  
			$services_map[$id]['service_model'] = $services[0]->service_model;  
			$services_map[$id]['completed'] = $investorproject->completed;  
		}
 		
		$investorProjectDetail_new = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail_data = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id])->orderBy(['id' => SORT_ASC])->all(); 

		//echo '<pre>'; print_r($services_map); exit;

		foreach($services_map as $service_id=>$service_val) {

			$action = Yii::$app->getRequest()->getQueryParam('action');
			 
			if(!$service_val['completed'] || $action == 'view') { 

				$service_model = $service_val['service_model'];
				
				if($serviceid != '') {
					$service_model = $services_map[$serviceid]['service_model'];
				}
			 

				$service = '\\app\\models\\'.$service_model;
				$model = $service::find()->where(['project_id'=>$project_id])->one();


			//echo '<pre>'; print_r($model); exit;
				if($model['id']) { 
					$disabled = 1; 
				}
				else {			
					$model = new $service();
					
					//--prepopulated 
					if($service_model == 'ServiceConsentToEstablish') {

						$model->sector_of_the_Industry = $investor_projects_details_vals['sector']; 
						
						$services_values = ServiceAuthorizationUnderHazardousWasteRules::find()->where(['project_id' => $project_id])->one();	
						if($services_values) {
							$this->get_servicesdata($model, $services_values);
						}

					}
					if($service_model == 'ServiceAuthorizationUnderHazardousWasteRules') {

						$model->sector_of_the_Industry = $investor_projects_details_vals['sector'];

						$services_values = ServiceConsentToEstablish::find()->where(['project_id'=>$project_id])->one();
						if($services_values) {
							$this->get_servicesdata($model, $services_values);
						}

					}
					 

					if($serviceid) { 
						//Yii::$app->getSession()->setFlash('success', 'You have to submit the current step first!'); 
						//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status]);
						return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
					}
				}	
				
				

				if ($model->load(Yii::$app->request->post())) {
					$model->project_id = $project_id;

					$model->created = date('Y-m-d H:i:s');
					$model->updated = date('Y-m-d H:i:s');

					if($model->save()) {
						$post = Yii::$app->request->post();
						$values['tab1'] = $post[$service_model];
						$json = json_encode($values);
						$InvestorProjectDetail_model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service_id]); 
						$InvestorProjectDetail_model->completed = 1;
						$InvestorProjectDetail_model->current_tab = 1;
						$InvestorProjectDetail_model->status = 2; 
						$InvestorProjectDetail_model->json = $json; 
						$InvestorProjectDetail_model->updated_by = $user_id; 
						$InvestorProjectDetail_model->save();
						//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status]);
						 

						return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
					}
					else {
						var_dump($model->errors);exit;

					}
				}

				$steps = '<ul class="steps steps-5">'.'<li><a href="'.Url::to(['caf/index', 'projectId' => $investorProjectDetail[0]->project_id, 'type' => $industry_status]).'" title="Consolidated Application Form"><em>Step 1: CAF</em><span></span></a></li>';
				$i = 2;
				$flag = 0;
				foreach($investorProjectDetail as $investorproject) {

 					$name = ''; 
					if(isset($services_map[$investorproject->service_id]["short_name"]))
							 $name = substr($services_map[$investorproject->service_id]["short_name"], 0, 80);
						if($name == '') {
							$name = substr($services_map[$investorproject->service_id]["name"], 0, 80);
					}

					$current = '';
					if($serviceid == $investorproject->service_id) {
						$current = ' class="current" ';
					}

					if($investorproject->completed) {
						$steps .= '<li '.$current.'><a href="'.Url::to(['caf/services', 'project_id' => $investorproject->project_id, 'serviceid'=> $investorproject->service_id, 'action'=>'view', 'type' => $industry_status]).'" title="'.$name.'"><em>Step '.$i.':</em><span> </span></a></li>';
					}
					else {
						if($flag == 0) {
							$steps .= '<li  '.$current.'><a href="'.Url::to(['caf/services', 'project_id' => $investorproject->project_id, 'type' => $industry_status]).'" title="' . $name . '"><em>Step '.$i.':</em><span> </span></a></li>';
							
							$flag = 1;
						}
						else {			
							$steps .= '<li  '.$current.'><a href="#" title="'.$name.'"><em>Step '.$i.':</em><span> </span></a></li>';
						}
					}
					$i++;
				}
				$steps .= '<li><a href="'.Url::to(['caf/upload', 'project_id' => $investorproject->project_id, 'type' => $industry_status]).'" title="Upload Enclosures"><em>Step '.$i.':</em><span></span></a></li>';  
				$steps .= '</ul>';

 				return $this->render($service_model, [ 
						'investorProjectDetail' => $investorProjectDetail,
						'services' => $services_map,
						'serviceid' => $serviceid,
						'model' => $model,
						'disabled' => $disabled,
						'investorProjectDetail_data' => $investorProjectDetail_data,
						'steps' => $steps
					]);
			}
		}

	}

	
	
	public function actionPreoperationalService() {

	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('project_id');
		$serviceid = Yii::$app->getRequest()->getQueryParam('serviceid');
		$disabled = 0;

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
			return $this->redirect(['caf', 'projectId' => $project_id]);
		}


		//check if need to redirect to doc upload page 
		$check_complete = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$check_complete = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2', 'type'=> 'pre-operational'])->orderBy(['id' => SORT_ASC])->all(); 
				
		$flag = 1;
		foreach($check_complete as $complete) {
			if($complete['completed'] != 1){
				$flag = 0;
				break;
			}
		}

		if($flag == 1) {
			$action = Yii::$app->getRequest()->getQueryParam('action');
			if($action != 'view') {
				return $this->redirect(['caf/upload', 'project_id' => $project_id]);
			}
		}

		if($project_id == '') {
			Yii::$app->getSession()->setFlash('success', 'project id missing'); 
			return $this->redirect(['investor/index']);
		}

 
		$investorProjectDetail = new InvestorProjectDetail();  
        $query = InvestorProjectDetail::find();  
        $investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2', 'type'=> 'pre-operational'])->orderBy(['id' => SORT_ASC])->all();
		
		$services = '';
		$services_map = array();  
		foreach($investorProjectDetail as $investorproject) { 
			$query = Services::find();  
			$services = $query->where(['id' => $investorproject->service_id])->all(); 

			$id = $services[0]->id;
			$services_map[$id]['name'] = $services[0]->services;
			$services_map[$id]['short_name'] = $services[0]->short_name;
			$services_map[$id]['department'] = $services[0]->department;  
			$services_map[$id]['service_model'] = $services[0]->service_model;  
			$services_map[$id]['completed'] = $investorproject->completed;  
		}

 		
		$investorProjectDetail_new = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();  
		$investorProjectDetail_data = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id])->orderBy(['id' => SORT_ASC])->all(); 
		
		foreach($services_map as $service_id=>$service_val) {

			$action = Yii::$app->getRequest()->getQueryParam('action');
			if(!$service_val['completed'] || $action == 'view') {  
				$service_model = $service_val['service_model'];
				 
				//print_r($service_model);
				//exit();

				$service = '\\app\\models\\' . $service_model;
				$model=$service::find()->where(['project_id'=>$project_id])->one();	
				if($model['id']) { 
					$disabled = 1;
				}
				else {			
					$model = new $service();
					if($serviceid) {
					//	Yii::$app->getSession()->setFlash('success', 'You have to submit the current step first!'); 
						//return $this->redirect(['investor/services', 'project_id' => $project_id]);	
						return $this->redirect(['caf/service', 'project_id' => $project_id]);
					}
				}
				
				if ($model->load(Yii::$app->request->post())) {
					$model->project_id = $project_id;
					if($model->save()) {
						$post = Yii::$app->request->post();
						$values = $post[$service_model];
						$json = json_encode($values);
						$InvestorProjectDetail_model = InvestorProjectDetail::findOne(['project_id' => $project_id, 'service_id' => $service_id]); 
						$InvestorProjectDetail_model->completed = 1;
						$InvestorProjectDetail_model->json = $json; 
						$InvestorProjectDetail_model->updated_by = $user_id;
						$InvestorProjectDetail_model->save();
						
						return $this->redirect(['caf/preoperational-service', 'project_id' => $project_id]);
					}
					else {
						print_r($model->getErrors());exit;

					}
				}

				
				$steps = '<ul class="steps steps-5">'.'<li><a href="/backoffice/index.php?r=caf/index&projectId=' . $investorProjectDetail[0]->project_id . '" title="Consolidated Application Form"><em>Step 1: CAF</em><span></span></a></li>';
				$i = 2;
				$flag = 0;
				foreach($investorProjectDetail as $investorproject) {
 					$name = ''; 
					if(isset($services_map[$investorproject->service_id]["short_name"]))
							 $name = $services_map[$investorproject->service_id]["short_name"];
						if($name == '') {
							$name = $services_map[$investorproject->service_id]["name"];
					}
					
					$current = '';
					
					if($serviceid == $investorproject->service_id) {
						$current = ' class="current" ';
					}
					
					if($investorproject->completed) {
						$steps .= '<li '.$current.'><a href="/backoffice/index.php?r=caf/services&project_id='.$investorproject->project_id.'&serviceid='.$investorproject->service_id.'&action=view" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
					}
					else {
						if($flag == 0) {
							$steps .= '<li '.$current.'><a href="/backoffice/index.php?r=caf/services&project_id='.$investorproject->project_id.'" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
							
							$flag = 1;
						}
						else {			
							$steps .= '<li '.$current.'><a href="#" title=""><em>Step '.$i.': Services - '.$name.'</em><span> </span></a></li>';
						}
					}
					$i++;
				}
				$steps .= '<li '.$current.'><a href="/backoffice/index.php?r=investor/upload&project_id=' . $investorProjectDetail[0]->project_id . '" title=""><em>Step '.$i.': Upload Enclosures</em><span></span></a></li>'; 
			//	  <!-- <li class="current"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li> -->
				$steps .= '</ul>';
				return $this->render($service_model, [ 
						'investorProjectDetail' => $investorProjectDetail,
						'services' => $services_map,
						'serviceid' => $serviceid,
						'model' => $model,
						'disabled' => $disabled,
						'investorProjectDetail_data' => $investorProjectDetail_data,
						'steps' => $steps
					]);
			}

		}
 
	}

    public function actionServicesManualProven() {
 	    
	    $user_id = Yii::$app->user->identity->id; 
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		
		$industry_status = Yii::$app->getRequest()->getQueryParam('type');

		if($industry_status == '') {
			return $this->redirect(['investor/index']);
		}
		else {
			if($industry_status == 'pre-operational') {
				$status = 'Pre Operational';
			}
			elseif($industry_status == 'pre-establishment') {
				$status = 'Pre Establishment';
			}
			else {
				return $this->redirect(['investor/index']);
			}
		}


		if($project_id == '') {
			return $this->redirect(['investor/index']);
		}

		
        $query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all(); 

		$investorproject_detail = array();
		foreach($investor_project as $investorProject) {
			$query = investorProjectDetail::find();
			$investorproject_detail = $query->where(['project_id' => $project_id])->all(); 
		} 
		
		$services = '';
		$services_map = array();
		$query = Services::find();  
		$services_manual = $query->where(['status' => 'A', 'industry_status'=> $status])->all(); 
			
		$investorproject_service = array();
		foreach($investorproject_detail as $investorprojectdetail) {
			$query = Services::find();
			$services = $query->where(['id' => $investorprojectdetail->service_id, 'status' => 'A', 'industry_status'=> $status])->all(); 
			
			if(isset($services[0])) {
				$id = $services[0]->id;
				$services_map[$id]['name'] = $services[0]->services;
				$services_map[$id]['department'] = $services[0]->department;

				
			   $investorproject_service[$id]['name'] = $services[0]->services;
			   $investorproject_service[$id]['department'] = $services[0]->department;
			   $investorproject_service[$id]['projectdetail'] = $investorprojectdetail;
			}

		} 

        $request = Yii::$app->request;
		$post = $request->post();

		if (count($post)){

			
			$investorProjectDetail = new InvestorProjectDetail();  
			$query = InvestorProjectDetail::find();  
			$investorProjectDetail = $query->where(['project_id' => $project_id, 'investor_id'=>$user_id, 'status'=> '2','completed'=> null])->orderBy(['id' => SORT_ASC])->all();

			if(isset($post['services'])) {

				$services = $post['services'];
				//echo '<pre>'; print_r($services); exit;
				foreach($services as $service) {
					
					$check_service = InvestorProjectDetail::find()->select('id')->where(['service_id'=> $service, 'project_id' => $project_id])->one(); 
 
					
					if(isset($check_service['id'])) {
						$check_service->status = '2';
						$check_service->save();
						continue;
					}
					else
					{
					$model = new InvestorProjectDetail();
					$model->investor_id = $user_id;
					$model->service_id = $service;
					$model->status = '2';
					$model->project_id = $project_id;
					$model->type = $industry_status;
					$model->created_by = $user_id;
					$model->save();
					}
				}

				if(isset($investorProjectDetail[0]['service_id'])) {
					$serviceid = $investorProjectDetail[0]['service_id'];
					
					//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status, 'serviceid' => $serviceid]);
					
					return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
				}
				else {
					//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status]);
					
					return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
				}  
			}
			else {

				if(isset($investorProjectDetail[0]['service_id'])) {
					$serviceid = $investorProjectDetail[0]['service_id'];
					
					//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status, 'serviceid' => $serviceid]);
					return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
				}
				else {
					//return $this->redirect(['investor/service', 'project_id' => $project_id, 'type' => $industry_status]);
					return $this->redirect(['caf/services', 'project_id' => $project_id, 'type' => $industry_status]);
				}  
			}
		}


        return $this->render('ServicesManual', [
            'investorproject_detail' => $investorproject_detail,
            'services' => $services_map,
			'services_manual' => $services_manual,
			'investorproject_service' => $investorproject_service
        ]);


    }

	
	public function get_servicesdata($model, $service_model){
		
		$model->electricity_company_name = $service_model->electricity_company_name;
		$model->consumer_no = $service_model->consumer_no;
		$model->on_east =  $service_model->on_east;
		$model->on_west = $service_model->on_west;
		$model->on_north = $service_model->on_north;
		$model->on_south = $service_model->on_south;
		$model->no_of_pumps = $service_model->no_of_pumps;
		$model->tube_wells = $service_model->tube_wells;
		$model->bore_wells = $service_model->bore_wells;
		$model->latitude = $service_model->latitude;
		$model->longitude = $service_model->longitude;
		$model->capacity_of_all = $service_model->capacity_of_all;
		$model->nationality = $service_model->nationality;
		$model->production_date = $service_model->production_date;
		$model->plant_commission = $service_model->plant_commission;
		$model->tsdf_name = $service_model->tsdf_name;
		$model->cetp_name = $service_model->cetp_name;
		$model->licence_ssi = $service_model->licence_ssi;
		$model->area = $service_model->area;
		$model->plantation_open = $service_model->plantation_open;
		$model->source_of_water_supply = $service_model->source_of_water_supply;
		$model->fresh_water_consumption = $service_model->fresh_water_consumption;
		$model->waste_water_generation = $service_model->waste_water_generation;
		$model->industrial_domestic = $service_model->industrial_domestic;
		$model->waste_water_discharge = $service_model->waste_water_discharge;
		$model->ultimate_receiving_body = $service_model->ultimate_receiving_body;
		$model->hazd_waste_storage = $service_model->hazd_waste_storage;
		$model->critical_polluted_area = $service_model->critical_polluted_area;
		$model->distance_from_residential = $service_model->distance_from_residential;
		$model->distance_from_eco_sensitive = $service_model->distance_from_eco_sensitive;
		$model->distance_from_highway = $service_model->distance_from_highway;
		$model->premise_area_sqmtr = $service_model->premise_area_sqmtr;
		$model->industrial_estate_in_notified_area = $service_model->industrial_estate_in_notified_area;
		$model->env_clearance = $service_model->env_clearance;
		$model->moef_seiaa = $service_model->moef_seiaa;
		$model->application_date = $service_model->application_date;
		$model->sector_of_the_Industry = $service_model->sector_of_the_Industry;
		$model->air_water_hazardous = $service_model->air_water_hazardous;
		$model->view_pdfs_files = $service_model->view_pdfs_files;
		$model->cte_on_east  = $service_model->cte_on_east;
		$model->cte_on_west  = $service_model->cte_on_west;
		$model->cte_on_north  = $service_model->cte_on_north;
		$model->cte_on_south  = $service_model->cte_on_south;
		$model->noc_cce_fees = $service_model->noc_cce_fees;
		$model->purpose_of_this_application  = $service_model->purpose_of_this_application;
		$model->any_relevant_information_to_be_mentioned  = $service_model->any_relevant_information_to_be_mentioned;
		$model->water_etps_ultimate_final_body  = $service_model->water_etps_ultimate_final_body;
		$model->water_etps_discharge_point = $service_model->water_etps_discharge_point;
		$model->water_etps_disposal_mode  = $service_model->water_etps_disposal_mode;
		$model->water_etps_for_domestic = $service_model->water_etps_for_domestic;
		$model->water_etps_disposal_details = $service_model->water_etps_disposal_details;
		$model->water_etps_fresh_wc_klpd  = $service_model->water_etps_fresh_wc_klpd;
		$model->water_etps_wwg_klpd  = $service_model->water_etps_wwg_klpd;
		$model->water_etps_tube_wells = $service_model->water_etps_tube_wells;
		$model->water_etps_bore_wells = $service_model->water_etps_bore_wells;
		$model->water_etps_capacity_hp = $service_model->water_etps_capacity_hp;
		$model->water_etps_cetp_member = $service_model->water_etps_cetp_member;
		$model->water_etps_water_source  = $service_model->water_etps_water_source;
		$model->water_etps_etp_stp_chamber = $service_model->water_etps_etp_stp_chamber;
		$model->water_etps_capacity  = $service_model->water_etps_capacity;
		$model->water_etps_units = $service_model->water_etps_units;
		$model->water_etps_date_of_commissioning  = $service_model->water_etps_date_of_commissioning;
		$model->water_etps_remarks = $service_model->water_etps_remarks;
		$model->wc_watCd  = $service_model->wc_watCd;
		$model->wc_watSrc = $service_model->wc_watSrc;
		$model->wc_kls_day = $service_model->wc_kls_day;
		$model->wc_wwg  = $service_model->wc_wwg;
		$model->wc_remarks  = $service_model->wc_remarks;
		$model->air_stack_emission_type = $service_model->air_stack_emission_type;
		$model->air_stack_attached_to  = $service_model->air_stack_attached_to;
		$model->air_stack_hgt_mtrs  = $service_model->air_stack_hgt_mtrs;
		$model->air_stack_remarks_capacity  = $service_model->air_stack_remarks_capacity;
		$model->air_stack_smf  = $service_model->air_stack_smf;
		$model->air_stack_fuel_used  = $service_model->air_stack_fuel_used;
		$model->air_stack_apc = $service_model->air_stack_apc;
		$model->air_stack_diameter = $service_model->air_stack_diameter;
		$model->air_stack_cons_hour_unit = $service_model->air_stack_cons_hour_unit;
		$model->air_stack_air_pollution_control_measures  = $service_model->air_stack_air_pollution_control_measures;
		$model->hazardous_waste_category  = $service_model->hazardous_waste_category;
		$model->hazardous_waste_name = $service_model->hazardous_waste_name;
		$model->hazardous_waste_qty_yr = $service_model->hazardous_waste_qty_yr;
		$model->hazardous_waste_unit  = $service_model->hazardous_waste_unit;
		$model->hazardous_waste_apc = $service_model->hazardous_waste_apc;
		$model->hazardous_waste_management_of_hazardous_waste_disposal = $service_model->hazardous_waste_management_of_hazardous_waste_disposal;
		$model->raw_material_product_name  = $service_model->raw_material_product_name;
		$model->raw_material_unit = $service_model->raw_material_unit;
		$model->raw_material_cte_quantity  = $service_model->raw_material_cte_quantity;
		$model->raw_material_applied_quantity = $service_model->raw_material_applied_quantity;
		$model->raw_material_remarks  = $service_model->raw_material_remarks;
		$model->raw_material_apc  = $service_model->raw_material_apc;
	}

	public function actionServicepol() {
		if(Yii::$app->request->isAjax)
		{	
			$this->enableCsrfValidation = false;

            $lid = ($_POST['id']);
		
	 $sql = "select * from yii_services
			where id = '".$lid."'";
		$commandsector = Yii::$app->db->createCommand(
			$sql
			);

		$services = $commandsector->queryAll();
	 	$totsecval = 0;
		//print_r($services);
		//exit();
		echo '
		<table class="table table-bordered table-striped table-hover">

		';

		foreach($services as $service)
		{
			 	echo '
			 	<thead>
		            <tr><th colspan="2" style="text-align:center;font-size:15px">'.$service['services'].'</th></tr>
				</thead>
				<tbody>
                    <tr><th>Department</th><td>'.$service['department'].'</td></tr>
                    <tr><th>When Approval Required</th><td>'.$service['when_approval_required'].'</td></tr>
                    <tr><th>Minimum Eligibility</th><td>'.$service['minimum_eligibility'].'</td></tr>
                    <tr><th>Act Rule</th><td>'.$service['act_rule'].'</td></tr>
                    <tr><th>Validity Of Approval</th><td>'.$service['validity_of_approval'].'</td></tr>
                    <tr><th>Procedure For Applying</th><td>'.$service['procedure_for_applying'].'</td></tr>
                    <tr><th>Website</th><td>'.$service['website'].'</td></tr>
                    <tr><th>Time Limit</th><td>'.$service['time_limit'].'</td></tr>
                    <tr><th>Authority Responsible</th><td>'.$service['authority_responsible'].'</td></tr>
                    <tr><th>Notified Under Public</th><td>'.$service['notified_under_public'].'</td></tr>
                    <tr><th>Any Other Special Condition</th><td>'.$service['any_other_special_condition'].'</td></tr>
                    <tr><th>Type Of Industry</th><td>'.$service['type_of_industry'].'</td></tr>
                    <tr><th>Industry Status</th><td>'.$service['industry_status'].'</td></tr>


	 	';
	 }
	 	echo '
		</tbody>
		</table>
		';

		/*
		echo '
		<table class="table">
			<thead>
			<tr>

			<th>
			Project Name
			</th>
			<th>
			Investor
			</th>
			<th style="text-align:right;">
			Project Value
			</th>

			</tr>
			</thead>
			<tbody>
		';
		
		foreach($modelsectors as $keysec=>$valsec)
		{
			
			echo '<tr>
					<td>
					'
			.$valsec['project'].
					'
					</td>
					<td>
		'.$valsec['investor_name'].'
					</td>
					<td style="text-align:right;">
		'.$valsec['total_value'].' Cr
					</td>

				</tr>

			';
			
			$totsecval = $modelsectors[$keysec]['total_value'] + $totsecval;
		}

		
		echo '
		</tbody>
		<tfoot>
		<tr>
		<th>
		</th>
		<th>
		Total
		</th>
		<th style="text-align:right;">
		'.$totsecval.' Cr
		</th>
		</tr>
		</tfoot>
		</table>';
		*/
		}

    }


}
