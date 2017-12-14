<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_grievance".
 *
 * @property integer $grievence_no
 * @property string $grievence_title
 * @property string $grievence_topic
 * @property string $grievence
 * @property integer $dept_id
 * @property integer $project_id
 * @property integer $service_id
 * @property string $grievence_created_by
 * @property string $grievence_created_on
 * @property string $have_replied
 * @property string $grievance_status
 * @property integer $grievance_reopen_count
 *
 * @property GrievanceDetail[] $grievanceDetails
 */
class Grievance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_grievance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grievence_title', 'grievence_topic', 'grievence', 'grievence_created_by', 'grievence_created_on'], 'required'],
            [['grievence', 'have_replied', 'grievance_status'], 'string'],
            [['dept_id', 'project_id', 'service_id', 'grievance_reopen_count'], 'integer'],
            [['grievence_created_on'], 'safe'],
            [['grievence_title', 'grievence_topic', 'grievence_created_by'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grievence_no' => 'Grievence No',
            'grievence_title' => 'Grievence Title',
            'grievence_topic' => 'Grievence Topic',
            'grievence' => 'Grievence',
            'dept_id' => 'Dept ID',
            'project_id' => 'Project ID',
            'service_id' => 'Service ID',
            'grievence_created_by' => 'Grievence Created By',
            'grievence_created_on' => 'Grievence Created On',
            'have_replied' => 'Have Replied',
            'grievance_status' => 'Grievance Status',
            'grievance_reopen_count' => 'Grievance Reopen Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrievanceDetails()
    {
        return $this->hasMany(GrievanceDetail::className(), ['grievence_no' => 'grievence_no']);
    }
}
