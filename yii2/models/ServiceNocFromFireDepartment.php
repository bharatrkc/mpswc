<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_noc_from_fire_department}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $type_of_noc
 * @property string $occupancy_type
 */
class ServiceNocFromFireDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_noc_from_fire_department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'type_of_noc', 'occupancy_type'], 'required'],
            [['project_id'], 'integer'],
            [['type_of_noc', 'occupancy_type'], 'string', 'max' => 255], 
			/*
			[['type_of_noc', 'occupancy_type'], 'match', 'pattern' => '/^[-\w\s\,]+$/', 'message' => 'Special characters not allowed'], */

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'type_of_noc' => 'Type Of Noc',
            'occupancy_type' => 'Occupancy Type',
        ];
    }
}
