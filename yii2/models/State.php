<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%state}}".
 *
 * @property integer $state_id
 * @property integer $country_id
 * @property string $state_code
 * @property string $name
 * @property string $description
 * @property string $em_code
 * @property string $status
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property District[] $districts
 * @property Country $country
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%state}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'country_id', 'state_code', 'name', 'status', 'created_by', 'updated_by'], 'required'],
            [['state_id', 'country_id'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['state_code', 'em_code'], 'string', 'max' => 10],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'country_id' => 'Country ID',
            'state_code' => 'State Code',
            'name' => 'Name',
            'description' => 'Description',
            'em_code' => 'Em Code',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }
}
