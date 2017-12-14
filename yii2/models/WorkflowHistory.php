<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_workflow_history".
 *
 * @property integer $history_id
 * @property integer $added_by_role_id
 * @property integer $added_by_user_id
 * @property integer $next_role_id
 * @property string $service_tag
 * @property string $comments
 * @property string $status
 * @property string $created_date_time
 * @property string $remote_address
 * @property string $user_agent
 * @property string $is_active
 *
 * @property Role $addedByRole
 * @property User $addedByUser
 * @property Role $nextRole
 */
class WorkflowHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_workflow_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['added_by_role_id', 'added_by_user_id', 'next_role_id', 'service_tag', 'comments', 'status', 'created_date_time', 'remote_address', 'user_agent'], 'required'],
            [['added_by_role_id', 'added_by_user_id', 'next_role_id'], 'integer'],
            [['service_tag', 'comments', 'status', 'is_active'], 'string'],
            [['created_date_time'], 'safe'],
            [['remote_address'], 'string', 'max' => 255],
            [['user_agent'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_id' => 'History ID',
            'added_by_role_id' => 'Added By Role ID',
            'added_by_user_id' => 'Added By User ID',
            'next_role_id' => 'Next Role ID',
            'service_tag' => 'Service Tag',
            'comments' => 'Comments',
            'status' => 'Status',
            'created_date_time' => 'Created Date Time',
            'remote_address' => 'Remote Address',
            'user_agent' => 'User Agent',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedByRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'added_by_role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedByUser()
    {
        return $this->hasOne(User::className(), ['id' => 'added_by_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNextRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'next_role_id']);
    }
}
