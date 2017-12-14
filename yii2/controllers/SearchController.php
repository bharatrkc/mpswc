<?php

namespace app\controllers;

use Yii; 
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SearchController implements the CRUD actions for Search model.
 */
class SearchController extends Controller
{
	 
	public $layout = 'investorLayoutIspinia'; 

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['create', 'update'],
				'rules' => [
					// deny all POST requests
					[
						'allow' => false,
						'verbs' => ['POST']
					],
					// allow authenticated users
					[
						'allow' => true,
						'roles' => ['@'],
					],
					// everything else is denied
				],
			],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
					],
			],
		];
    } 


    public function actionResult() { 

        return $this->render('result');
    } 

}
