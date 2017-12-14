<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination; 
use yii\db\Query;
use app\models\Questionnaire; 
use app\models\Questiongroup; 
use app\models\Questions; 
use app\models\Answers;
use app\models\ServicewizardForm;
use app\models\PrestablishwizardForm;
use app\models\Services; 
use app\models\InvestorProjects;
use app\models\InvestorProjectDetail;

 
class WizardController extends Controller {

	public $layout = 'investorLayoutIspinia';

	public function actionIndex() { 
		
        return $this->render('index');
	}


    public function actionService() {
	
		$this->layout = 'main'; 

		$grp_id = array();
		$questiongroups = Array(); 

        $query = Questionnaire::find();  
        $questionnaire = $query->where(['abbr' => ['PRE_EST_WIZARD', 'PRE_OPE_WIZARD'] , 'status' => 'Y'])->limit(2)->all(); 
	
		foreach($questionnaire as $ques) {
			$questionnaire_id = $ques->id;
			$query = Questiongroup::find()->select('id, heading'); 
			$questiongroups[] = $query->where(['questionnaire_id' => $questionnaire_id, 'status' => 'A'])->orderBy('disp_order')->all(); 
		}
		
		foreach($questiongroups as $key=>$ques_group) {
			$grp_id[] = $ques_group[0]->id;  
		} 
 
        $query = Questions::find()->select('id, grp_id, text, render_type, parent_id , abbr_remark'); 
        $questions = $query->where(['grp_id'=>$grp_id, 'status'=>'A'])->orderBy('disp_order')->all();
		
		//print_r($questions); exit();

		$questions_ids = array();
		$_questions = array();
		foreach($questions as $question) {
			$questions_ids[] = $question->id;
			$_questions[$question->id] = $question->parent_id;
		}

        $query = Answers::find()->select('id, text, question_id, parent_ans_id, dependent_questions, pollution_remark');  
        $answers = $query->where(['question_id'=>$questions_ids, 'status'=>'A'])->orderBy('disp_order')->all(); 
		
		$_answers = array();
		$_answer_ids = array();
		$_answers_dependent_questions = array();
		foreach($answers as $answer) {
			$_answer_ids[$answer->id] = $answer->id;
			$_answers[$answer->id]['question_id'] = $answer->question_id;
			$_answers[$answer->id]['parent_ans_id'] = $answer->parent_ans_id;
			$_answers[$answer->id]['pollution_remark'] = $answer->pollution_remark;
			
			if($answer->dependent_questions) {
				$_answers_dependent_questions[$answer->dependent_questions] = $answer->dependent_questions;
			}
		}
	 
		//----------------------------
  
        $model = new ServicewizardForm();
		if ($model->validate()) {

			if(count($_POST)) {  

				//$this->check_security($_POST['wizardForm'], $_questions, $_answer_ids, $_answers, $_answers_dependent_questions); 

				 $post_answers_ids = array();
				 foreach($_POST['wizardForm'] as $val) {
					 if(is_array($val)) { 
						foreach($val as $services) {
							if($services)
								$post_answers_ids[] = $services;
						}
					 }
					 else{
						 if($val)
							$post_answers_ids[] = $val;
					 }
				 }

				 $session = Yii::$app->session;
				 $session->set('post_answers_ids', $post_answers_ids); 
				 return $this->redirect(['wizard/servicelist', 'post_answers_ids'=>implode(',', $post_answers_ids)]);
			 }
		} else {
			// validation failed: $errors is an array containing error messages
			$errors = $model->errors;
		}

        return $this->render('service', [
            'model' => $model,
            'questiongroups' => $questiongroups,
            'questions' => $questions,
            'answers' => $answers
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
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionServicelist() {
	
		$this->layout = 'main'; 
			   
		$session = Yii::$app->session;
		$request = Yii::$app->request;

		// get a session variable. The following usages are equivalent:
		//$post_answers_ids = $session->get('post_answers_ids');
		//$query = new \App\Query;
		$query = new \yii\db\Query;
		$query->select("yii_services.* ")  
				->from('yii_services');

		if(!empty($request->get('post_answers_ids')))
		{
        $get_service_id = $request->get('post_answers_ids');
		$post_answers_ids = explode(",", $get_service_id);

		$query->join(	'INNER JOIN', 
						'yii_answer_services_mapping',
						'yii_services.id = yii_answer_services_mapping.service_id'
					);
		}
				
 		//echo "<pre>"; print_r($post_answers_ids); echo "</pre>";
		if(!empty($request->get('post_answers_ids'))) {

			$query->where(['yii_answer_services_mapping.answer_id' => $post_answers_ids]);
			$query->groupBy(['yii_answer_services_mapping.answer_id','yii_answer_services_mapping.service_id']);
			$command = $query->createCommand();
			$servicelist = $command->queryAll();
		}
		else if(!empty($request->get('post_prestablishment'))) {


			$post_serviceindustry = $request->get('post_prestablishment');
 			//$query->where(['yii_answer_services_mapping.answer_id' => $post_answers_ids]);
			$query->where(['yii_services.industry_status' => $post_serviceindustry]);
			//$query->groupBy(['yii_answer_services_mapping.answer_id','yii_answer_services_mapping.service_id']);
			$command = $query->createCommand();
			$servicelist = $command->queryAll();

		}
		else if(!empty($request->get('post_preoperational'))) {

			$post_serviceindustry = $request->get('post_preoperational');
			$query->where(['yii_services.industry_status' => $post_serviceindustry]);
			//$query->groupBy(['yii_answer_services_mapping.answer_id','yii_answer_services_mapping.service_id']);
			$command = $query->createCommand();
			$servicelist = $command->queryAll();
			//echo $command->getRawSql();
			//exit();
		}
		else if(!empty($request->get('post_all_services'))) {

			$post_serviceindustry = $request->get('post_all_services');
			//$query->groupBy(['yii_answer_services_mapping.answer_id','yii_answer_services_mapping.service_id']);
			$command = $query->createCommand();
			$servicelist = $command->queryAll();
			//echo $command->getRawSql();
		}
		
		// echo "<pre>" ; print_r($servicelist); echo "</pre>";

		$servicelist_arr = array();
		foreach ($servicelist as $service){	

				if($service['industry_status'] == 'Pre Establishment') {
					$servicelist_arr['Pre Establishment'][] = $service;
				}
				else if($service['industry_status'] == 'Pre Operational') {
					$servicelist_arr['Pre Operational'][] = $service;

				}
		}
 

        return $this->render('servicelist', [
            'servicelist' => $servicelist_arr,
        ]);

    }

        public function actionInternalwizard() {

		$grp_id = array();
		$questiongroups = Array();

		$user_id = Yii::$app->user->identity->id;

        $query = Questionnaire::find();  
        $questionnaire = $query->where(['abbr' => ['PRE_EST_WIZARD', 'PRE_OPE_WIZARD'] , 'status' => 'Y'])->limit(2)->all(); 
	
		foreach($questionnaire as $ques) {
			$questionnaire_id = $ques->id;
			$query = Questiongroup::find()->select('id, heading'); 
			$questiongroups[] = $query->where(['questionnaire_id' => $questionnaire_id, 'status' => 'A'])->orderBy('disp_order')->all(); 
		}

		
		foreach($questiongroups as $key=>$ques_group) {
			$grp_id[] = $ques_group[0]->id;  
		} 
 
        $query = Questions::find()->select('id, grp_id, text, render_type, parent_id , abbr_remark'); 
        $questions = $query->where(['grp_id'=>$grp_id, 'status'=>'A'])->orderBy('disp_order')->all();


		//echo "<pre>"; print_r($questions); echo "</pre>"; exit();

		$questions_ids = array();
		$_questions = array();
		foreach($questions as $question) {
			$questions_ids[] = $question->id;
			$_questions[$question->id] = $question->parent_id;
		} 
 
        $query = Answers::find()->select('id, text, question_id, parent_ans_id, dependent_questions,pollution_remark');
        $answers = $query->where(['question_id'=>$questions_ids, 'status'=>'A'])->orderBy('disp_order')->all(); 
		
		$_answers = array();
		$_answer_ids = array();
		$_answers_dependent_questions = array();
		foreach($answers as $answer) {
			$_answer_ids[$answer->id] = $answer->id;
			$_answers[$answer->id]['question_id'] = $answer->question_id;
			$_answers[$answer->id]['parent_ans_id'] = $answer->parent_ans_id;

			if($answer->dependent_questions) {
				$_answers_dependent_questions[$answer->dependent_questions] = $answer->dependent_questions;
			}
		}
		//------------------- 
		$request = Yii::$app->request;
		$project_id = $request->get('id');
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all();
		if(count($investor_project) == 0) {

			 Yii::$app->getSession()->setFlash('success', 'Project is not selected.'); 
			 return $this->redirect(['investor/index']);
		}
		//------------ 
		if(count($_POST) > 1) {
				//$this->check_security($_POST['PreEstablish'], $_questions, $_answer_ids, $_answers, $_answers_dependent_questions); 

				$post_answers_ids = array();
				 foreach($_POST['wizardForm'] as $val) {
					 if(is_array($val)) {
						foreach($val as $services) {
							if($services)
								$post_answers_ids[] = $services;
						}
					 }
					 else{
						 if($val)
							$post_answers_ids[] = $val;
					 }
				 }
 

				if(count($post_answers_ids)) {

					$query = new \yii\db\Query;
					$query->select("yii_services.* ")  
							->from('yii_answer_services_mapping')
							->join(	'INNER JOIN',
									'yii_services',
									'yii_services.id = yii_answer_services_mapping.service_id');
					$query->where(['yii_answer_services_mapping.answer_id' => $post_answers_ids,'yii_services.integration_flag' => '1',
						'yii_services.status' => 'A'])->groupBy('yii_services.id');

					$command = $query->createCommand();

				//	echo $command->getRawSql(); exit();

					$servicelist = $command->queryAll();
					if(count($servicelist)) {
						$project_id = $request->get('id');

						//echo "<pre>";
						//print_r($servicelist);
						//echo "</pre>";
					
						//exit();
						if(isset($post_answers_ids)) {
						$project_ques = InvestorProjects::find();
						$project_details = $project_ques->where(['id'=>$project_id])->one();
						$project_details->answer_json = json_encode($post_answers_ids,JSON_UNESCAPED_UNICODE);
						$project_details->commencement_date = date('d-m-Y',strtotime($project_details->commencement_date));
						//echo "<pre>";
						//print_r($project_details);
						//echo "</pre>"; exit();
						if ($project_details->save()) {
								
							}
						else{
			        		$err="";
			        		foreach ($project_details->geterrors() as $field => $errors) {
			        			foreach ($errors as $key => $errs) {
			        			$err.="'" . $field . "' " .$errs;
			        			
			        			}
			        		}
			        		
			        		Yii::$app->getSession()->setFlash('error', "Please resolove following issues: ". $err); 

				        	}
			        	}

						foreach($servicelist as $val){

							 $check_service = InvestorProjectDetail::find()->select('id');   
							 $check_service = $check_service->where(['service_id'=> $val['id'], 'project_id'=>$project_id])->one();
 
							if(isset($check_service)) {
								$check_service->status = '2';
								$check_service->save();
								continue;
							}

							$model = new InvestorProjectDetail();
							$model->investor_id = $user_id;
							$model->service_id = $val['id'];
							$model->project_id = $project_id;

							if($val['industry_status']=='Pre Establishment')
							{
							$model->type = 'pre-establishment';								
							}
							else if($val['industry_status']=='Pre Operational')
							{
							$model->type = 'pre-operational';
							}

						/*	echo "<pre>";
							print_r($model);
							echo "</pre>"; */
							$model->created_by = $user_id;
							$model->save();
						}
						// exit();
					}
					return $this->redirect(['caf/cafservices', 'projectId'=>$project_id]);
					// return $this->refresh();
				}
				//---------------------------------------------- 
		}


        return $this->render('prestablish', [
            'questiongroups' => $questiongroups,
            'questions' => $questions,
            'answers' => $answers,
			'investor_project' => $investor_project,
        ]);

    }

	

    public function actionPrestablish() {
		
		$grp_id = array();
		$questiongroups = Array();
		$user_id = Yii::$app->user->identity->id;

        $query = Questionnaire::find();  
        $questionnaire = $query->where(['abbr' => 'PRE_EST_CAF_WIZARD', 'status' => 'Y'])->limit(1)->all(); 
		
		foreach($questionnaire as $ques) {
			$questionnaire_id = $ques->id;
			$query = Questiongroup::find()->select('id, heading'); 
			$questiongroups = $query->where(['questionnaire_id' => $questionnaire_id, 'status' => 'A'])->orderBy('disp_order')->all(); 
		}
		
		foreach($questiongroups as $ques_group) {
			$grp_id[] = $ques_group->id;  
		} 
        $query = Questions::find()->select('id, grp_id, text, render_type, parent_id'); 
        $questions = $query->where(['grp_id'=>$grp_id, 'status'=>'A'])->orderBy('disp_order')->all();
		
		$questions_ids = array();
		$_questions = array();
		foreach($questions as $question) {
			$questions_ids[] = $question->id;
			$_questions[$question->id] = $question->parent_id;
		} 
 
        $query = Answers::find()->select('id, text, question_id, parent_ans_id, dependent_questions');  
        $answers = $query->where(['question_id'=>$questions_ids, 'status'=>'A'])->orderBy('disp_order')->all(); 
		
		$_answers = array();
		$_answer_ids = array();
		$_answers_dependent_questions = array();
		foreach($answers as $answer) {
			$_answer_ids[$answer->id] = $answer->id;
			$_answers[$answer->id]['question_id'] = $answer->question_id;
			$_answers[$answer->id]['parent_ans_id'] = $answer->parent_ans_id;

			if($answer->dependent_questions) {
				$_answers_dependent_questions[$answer->dependent_questions] = $answer->dependent_questions;
			}
		}
		//------------------- 
		$request = Yii::$app->request;
		$project_id = $request->get('id');
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all();
		if(count($investor_project) == 0) {

			 Yii::$app->getSession()->setFlash('success', 'Project is not selected.'); 
			 return $this->redirect(['investor/index']);
		}
		//------------ 
		if(count($_POST) > 1) {
				//$this->check_security($_POST['PreEstablish'], $_questions, $_answer_ids, $_answers, $_answers_dependent_questions); 

				$post_answers_ids = array();
				 foreach($_POST['PreEstablish'] as $val) {
					 if(is_array($val)) { 
						foreach($val as $services) {
							if($services)
								$post_answers_ids[] = $services;
						}
					 }
					 else{
						 if($val)
							$post_answers_ids[] = $val;
					 }
				 }
 

				if(count($post_answers_ids)) {

					$query = new \yii\db\Query;
					$query->select("yii_services.* ")  
							->from('yii_answer_services_mapping')
							->join(	'INNER JOIN', 
									'yii_services',
									'yii_services.id = yii_answer_services_mapping.service_id');
					$query->where(['yii_answer_services_mapping.answer_id' => $post_answers_ids])->groupBy('id'); 
					
					$command = $query->createCommand(); 
					$servicelist = $command->queryAll();
					if(count($servicelist)) { 
						$project_id = $request->get('id');

						foreach($servicelist as $val){

							 $check_service = InvestorProjectDetail::find()->select('id');   
							 $check_service = $check_service->where(['service_id'=> $val['id'], 'project_id'=>$project_id])->one();
 
							if(isset($check_service)) {
								$check_service->status = '2';
								$check_service->save();
								continue;
							}

							$model = new InvestorProjectDetail();
							$model->investor_id = $user_id;
							$model->service_id = $val['id'];
							$model->project_id = $project_id;
							$model->type = 'pre-establishment';
							$model->created_by = $user_id;
							$model->save();
						}
					} 
					return $this->redirect(['caf/cafservices', 'projectId'=>$project_id]);
					// return $this->refresh();
				}
				//---------------------------------------------- 
		}
        return $this->render('prestablish', [
            'questiongroups' => $questiongroups,
            'questions' => $questions,
            'answers' => $answers,
			'investor_project' => $investor_project,
        ]);

    }

    public function actionPreOperational() { 
		
		$grp_id = array();
		$questiongroups = Array();
		$user_id = Yii::$app->user->identity->id;

        $query = Questionnaire::find();  
        $questionnaire = $query->where(['abbr' => 'PRE_OPE_CAF_WIZARD', 'status' => 'Y'])->limit(1)->all();
		foreach($questionnaire as $ques) {
			$questionnaire_id = $ques->id;
			$query = Questiongroup::find()->select('id, heading');
			$questiongroups = $query->where(['questionnaire_id' => $questionnaire_id, 'status' => 'A'])->orderBy('disp_order')->all(); 
		}

		foreach($questiongroups as $ques_group) {
			$grp_id[] = $ques_group->id;  
		}
        $query = Questions::find()->select('id, grp_id, text, render_type, parent_id'); 
        $questions = $query->where(['grp_id'=>$grp_id, 'status'=>'A'])->orderBy('disp_order')->all();
		
		$questions_ids = array();
		$_questions = array();
		foreach($questions as $question) {
			$questions_ids[] = $question->id;  

			$_questions[$question->id] = $question->parent_id;
		}
 
        $query = Answers::find()->select('id, text, question_id, parent_ans_id, dependent_questions');  
        $answers = $query->where(['question_id'=>$questions_ids, 'status'=>'A'])->orderBy('disp_order')->all(); 
		
		$_answers = array();
		$_answer_ids = array();
		$_answers_dependent_questions = array();
		foreach($answers as $answer) {
			$_answer_ids[$answer->id] = $answer->id;
			$_answers[$answer->id]['question_id'] = $answer->question_id;
			$_answers[$answer->id]['parent_ans_id'] = $answer->parent_ans_id;

			if($answer->dependent_questions) {
				$_answers_dependent_questions[$answer->dependent_questions] = $answer->dependent_questions;
			}
		}
		//------------------- 
		$sector_project = '';
		$request = Yii::$app->request;
		$project_id = $request->get('id');
		$query = InvestorProjects::find();  
        $investor_project = $query->where(['investor_id' => $user_id, 'id' => $project_id])->all();
		if(isset($investor_project[0]->sector)) {
			$sector_project = $investor_project[0]->sector;
			if(count($investor_project) == 0) {
				 Yii::$app->getSession()->setFlash('success', 'Project is not selected.'); 
				 return $this->redirect(['investor/index']);
			}
		}
		else {

			 Yii::$app->getSession()->setFlash('success', 'Please take the pre-establishment services first.'); 
			 return $this->redirect(['investor/index']);
		}
		//------------ 

		if(count($_POST) > 1) { 
				//$this->check_security($_POST['wizardForm'], $_questions, $_answer_ids, $_answers, $_answers_dependent_questions); 
				$post_answers_ids = array();
				 foreach($_POST['wizardForm'] as $val) {
					 if(is_array($val)) { 
						foreach($val as $services) {
							if($services)
								$post_answers_ids[] = $services;
						}
					 }
					 else{
						 if($val)
							$post_answers_ids[] = $val;
					 }
				 }
				if(count($post_answers_ids)) {

					$query = new \yii\db\Query;
					$query->select("yii_services.* ")  
							->from('yii_answer_services_mapping')
							->join(	'INNER JOIN', 
									'yii_services',
									'yii_services.id = yii_answer_services_mapping.service_id');
					$query->where(['yii_answer_services_mapping.answer_id' => $post_answers_ids])->groupBy('id');
					$command = $query->createCommand(); 
					$servicelist = $command->queryAll();  

					if(count($servicelist)) {
						$project_id = $request->get('id');
						foreach($servicelist as $val){	
							
							$check_service = InvestorProjectDetail::find()->select('id');   
							$check_service = $check_service->where(['service_id'=> $val['id'], 'project_id'=> $project_id])->one();
							if(isset($check_service)){
							$check_service->status = '2';
							$check_service->save();
							continue;
							}


							$model = new InvestorProjectDetail();
							$model->investor_id = $user_id;
							$model->service_id = $val['id'];
							$model->project_id = $project_id;
							$model->type = 'pre-operational';
							$model->created_by = $user_id;
							$model->save();
						}
					}

					return $this->redirect(['caf/cafservices', 'projectId' => $project_id]);
					// return $this->refresh();
				}  
				//---------------------------------------------- 
		} 

        return $this->render('preoperational', [ 
            'questiongroups' => $questiongroups,
            'questions' => $questions,
            'answers' => $answers,
			'sector_project' => $sector_project
        ]);


    }

    public function actionAnsortSsdsdksaldkslkdlkasdlsad()
    {

    	$queryx = Answers::find()->select('id, text, disp_order,question_id, parent_ans_id, dependent_questions, pollution_remark');  
        
        $answers = $queryx->orderBy(
								  'question_id,
								  text'
								)->all();
		echo "<table>";
		
		$xquesid ="";

		$storeotherid = array();
		$count = 1;
		foreach($answers as $answer) {
			echo "<tr><td>";
			echo $answer->question_id;
			echo "-</td><td>";
			echo $answer->disp_order;
			echo "</td><td>";
			
			
			if($answer->question_id != $xquesid)
			{
				if($xquesid!="")
				{
					$count = 1;
				}
				$xquesid = $answer->question_id;
			}
			
			echo "disp - ".$count;

			$querynew = Answers::find()->select('id, disp_order,text, question_id, parent_ans_id, dependent_questions');
			$answersnew = $querynew->where(['id'=>$answer->id])->one();

		/*	Yii::$app->db->createCommand("update yii_answers set disp_order=:value1 where id=:id")
						->bindValue(':id',$answer->id)
						->bindValue(':value1',$count)
						->execute();
		*/
			//$answersnew->disp_order = $count;
			//$answersnew->save();

			if($answer->text=="Other")
			{
				echo $answer->text;
				$storeotherid[$answer->question_id] = $answer->id;
			}
			elseif($answer->text=="Others")
			{
				echo $answer->text;
				$storeotherid[$answer->question_id] = $answer->id;
			}
			elseif($answer->text=="Other (Please mention in the box)")
			{
				echo $answer->text;
				$storeotherid[$answer->question_id] = $answer->id;
			}

			else
			{
				$count = $count + 1;
			}

			echo "</td></tr>";
		}
    		echo "</table>";
    }


}

