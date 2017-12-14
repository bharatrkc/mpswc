<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%district}}".
 *
 * @property integer $district_id
 * @property integer $state_id
 * @property string $district_code
 * @property string $name
 * @property string $description
 * @property string $em_code
 * @property string $status
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $zone
 *
 * @property State $state
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%district}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'state_id', 'district_code', 'name', 'status', 'created_by', 'updated_by'], 'required'],
            [['district_id', 'state_id'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['district_code', 'em_code'], 'string', 'max' => 10],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['status', 'zone'], 'string', 'max' => 1],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'state_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'District ID',
            'state_id' => 'State ID',
            'district_code' => 'District Code',
            'name' => 'Name',
            'description' => 'Description',
            'em_code' => 'Em Code',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'zone' => 'Zone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'state_id']);
    }
}
