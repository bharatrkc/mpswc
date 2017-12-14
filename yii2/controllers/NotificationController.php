<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\Notification;
use app\models\Notificationsearch;

use app\models\User;
use app\models\UserProfile;
use app\models\Caf;

use app\models\InvestorProjectDetail;
use app\models\InvestorProjects;

/**
 * NotificationController implements the CRUD actions for Notification model.
 */
class NotificationController extends Controller
{

		public $layout = 'investorLayoutIspiniaCaf';

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
     * Lists all Notification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Notificationsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notification model.
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
     * Creates a new Notification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Notification();
		
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
		

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'cafdata' => $cafdata,
            ]);
        }
    }

    /**
     * Updates an existing Notification model.
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
     * Deletes an existing Notification model.
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
     * Finds the Notification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjax() 
       { 
           $data = Yii::$app->request->post('id'); 
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
			   
           } else { 
               $test = $data; 
           }
           return $test; 
       } 
}
