<?php

namespace app\controllers;
use app\models\Notifications;
use yii\helpers\BaseUrl;

class NotificationsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->render('index');
		
		$cafid = 12;
		$serviceid = 12 ;
		$userid = 23 ;
		$eventname = "add"; // Can be "add", "update" , "delete"
		$notifytext = "The message against your service approval or any thing";
		$datenotify = date('Y-m-d H:i:s');
		
		$arr_param = array(
					'r'=>'notifications/createnotifications',
					'caf_id'=>$cafid,
					'service_id'=>$serviceid,
					'user_id'=>$userid,
					't_event'=>$eventname,
					'notification_detail'=>$notifytext,
					'date_created'=>$datenotify );
		
		$urlto_hit = "http://".$_SERVER['HTTP_HOST'].BaseUrl::base()."/index.php?";
		
		
        $urlto_hit .= http_build_query($arr_param,'','&');
	
    $json_reply = file_get_contents($urlto_hit) or die(print_r(error_get_last()));
    echo $json_reply;
	}

	public function actionCreatenotifications()
   {
        \yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

	$notifications = new Notifications();
	$notifications->scenario = Notifications:: SCENARIO_CREATE;
	$notifications->attributes = \yii::$app->request->get();
	
	if($notifications->validate()){
	$notifications->save();
	return array('status' => true, 'data'=> 'Notifications record is successfully Added');
	}
		else{
			return array('status'=>false,'data'=>$notifications->getErrors());
		}
	}
}
