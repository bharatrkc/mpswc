<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%investor_project_detail}}".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $status
 * @property string $json
 * @property integer $current_tab
 * @property integer $investor_id
 * @property integer $project_id
 * @property string $created
 * @property integer $created_by
 * @property string $updated
 * @property integer $updated_by
 */
class InvestorProjectDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%investor_project_detail}}';
    }
 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'status' => 'Status',
            'json' => 'Json',
            'current_tab' => 'Current Tab',
            'investor_id' => 'Investor ID',
            'project_id' => 'ID',
            'created' => 'Created',
            'created_by' => 'Created By',
            'updated' => 'Updated',
            'updated_by' => 'Updated By',
        ];
    }
}
