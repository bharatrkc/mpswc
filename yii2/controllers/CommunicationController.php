<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Precho;
use app\models\Communication;
use app\models\Communicationsearch;

use app\models\User;
use app\models\UserProfile;
use app\models\Caf;

use app\models\InvestorProjectDetail;
use app\models\InvestorProjects;

use app\models\Services;

/**
 * CommunicationController implements the CRUD actions for Communication model.
 */
class CommunicationController extends Controller
{

		public $layout = 'investorLayoutIspiniaTrifac';

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

    /**
     * Lists all Communication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Communicationsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Communication model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Communication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$model = new Communication();
		
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		$service_id = Yii::$app->getRequest()->getQueryParam('serviceId');
		
		$prosingle['proid'] = $project_id;
		$prosingle['serveid'] = $service_id;
		
		$cafdata1 = array();
		$pdata1 = array();
		
		if(isset($project_id))
		{
				$query = InvestorProjects::find();
				$investor_projectone = $query->select(['id','project'])->where(['id'=>$project_id])->one();

				$x = 0;

				foreach($investor_projectone as $keyp => $inpro)
				{
					$cafqry1 = Caf::find();
					$cafdata1[$x]['caf'] = $cafqry1->select(['id','project_id'])->where(['project_id'=>$investor_projectone['id']])->one();
					$cafdata1[$x]['pro'] = $investor_projectone;
					$x = $x +1;
				}

			if(isset($service_id))
			{
				$query = Services::find();
				$investor_servone = $query->select(['id','services'])->where(['id'=>$service_id])->one();

				$pdqry1 = InvestorProjectDetail::find();
				$pdata1[0]['servdetail'] = $pdqry1->select(['id','service_id','project_id'])->where(['project_id'=>$project_id,'service_id'=>$service_id])->one();
				$pdata1[0]['serv'] = $investor_servone;					
			}
			

			// Precho::pre($pdata1);

		}
				
			
			$query = InvestorProjects::find();  
   		    $investor_project = $query->select(['id','project'])->all();
		
			$x = 0;	
			
		foreach($investor_project as $inpro)
			{
				$cafqry = Caf::find();
				$cafdata[$x]['caf'] = $cafqry->select(['id','project_id'])->where(['project_id'=>$inpro->id])->one();
				$cafdata[$x]['pro'] = $inpro;
				$x = $x +1;
			}
		
		$query = InvestorProjectDetail::find();
		
		$investorProjectDetail = $query->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'cafdata' => $cafdata,
				'cafdata1' => $cafdata1,
				'prosingle' => $prosingle,
				'pdata1' => $pdata1,
            ]);
        }
    }

    /**
     * Updates an existing Communication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$query = InvestorProjects::find();  
        
		$investor_project = $query->select(['id','project'])->all();
		
		$x = 0;	
		foreach($investor_project as $inpro)
		{
			$cafqry = Caf::find();
	        $cafdata[$x]['caf'] = $cafqry->select(['id','project_id'])->where(['project_id'=>$inpro->id])->one();
			$cafdata[$x]['pro'] = $inpro;
			$x = $x +1;
		}

		$investorProjectDetail = new InvestorProjectDetail();  
		$query = InvestorProjectDetail::find();
		
		$investorProjectDetail = $query->all();
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'cafdata' => $cafdata,
            ]);
        }
    }

    /**
     * Deletes an existing Communication model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Communication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Communication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Communication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjax() 
       { 
           $data = Yii::$app->request->post('id'); 
		   $projid = Yii::$app->request->post('project_id');
           
		   if (isset($data)) {
			   $ndata = explode("/",$data);
			   $ndatain = explode(":",$ndata[0]);
			   $ndatainx = trim($ndatain[1]);
		       $model = Caf::find()->where(['id'=>$ndatainx])->one();
			
				$query = InvestorProjects::find();
        		$investor_project = $query->select(['id','project','investor_id'])->where(['id'=>$model->project_id])->one();
				$userprofiles1 = UserProfile::findOne(['user_id' => $investor_project->investor_id]);
			   	$test = "
				<div id='ajaxdiv'>
				<h4>Project Id: ".$investor_project->id."</h4>
				<h4>Project : ".$investor_project->project."</h4>
				<h4>Investor Id: ".$investor_project->investor_id."</h4>
				<input type='hidden' name='invstid' value='".$investor_project->investor_id."' id='invstidin'>
				<input type='hidden' name='cafidn' value='".$model->id."' id='cafidin'>
				<h4>Investor Name : ".$userprofiles1->first_name." ".$userprofiles1->last_name."</h4>
				</div>
				";
			   //echo "<pre>";
			   //print_r($investor_project);
			   
           }
		   
		   elseif (isset($projid)) {
				$query = InvestorProjects::find();
        		$investor_project = $query->select(['id','project','investor_id'])->where(['id'=>$projid])->one();
				$userprofiles1 = UserProfile::findOne(['user_id' => $investor_project->investor_id]);
			   	$test = "
				<div id='ajaxdiv'>
				<h4>Project Id: ".$investor_project->id."</h4>
				<h4>Project : ".$investor_project->project."</h4>
				<h4>Investor Id: ".$investor_project->investor_id."</h4>
				<input type='hidden' name='invstid' value='".$investor_project->investor_id."' id='invstidin'>
				
				<h4>Investor Name : ".$userprofiles1->first_name." ".$userprofiles1->last_name."</h4>
				</div>
				";
			   //echo "<pre>";
			   //print_r($investor_project);
			   
           }
		   
		   else { 
               $test = $data; 
           }
           return $test; 
       } 
}
