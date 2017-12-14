<?php
namespace app\models;
use Yii;
use app\models\WorkflowHistory;
use app\models\Roles;

/**
* this file contains all the functions related to the workflow
*/
class WorkflowHistoryExt extends WorkflowHistory
{
    public static function generateHistory($app_tag,$apr_roll_id,$apr_user_id,$next_role_id,$comments,$app_status='P')
    {
        $model = new WorkflowHistory;
        $model->added_by_role_id=$apr_roll_id;
        $model->added_by_user_id=$apr_user_id;
        $model->next_role_id=$next_role_id;
        $model->service_tag=$app_tag;
        $model->comments=$comments;
        $model->status=$app_status;
        $model->created_date_time=date("Y-m-d H:i:s");
        $model->remote_address=$_SERVER['REMOTE_ADDR'];
        $model->user_agent=$_SERVER['HTTP_USER_AGENT'];
        if($model->save())
            return true;
        return false;

    }
}
