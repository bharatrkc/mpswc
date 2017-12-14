<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%country}}".
 *
 * @property integer $country_id
 * @property string $country_code
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property State[] $states
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%country}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'country_code', 'name', 'status', 'created_by', 'updated_by'], 'required'],
            [['country_id'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['country_code'], 'string', 'max' => 10],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'name' => 'Name',
            'description' => 'Description',
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
    public function getStates()
    {
        return $this->hasMany(State::className(), ['country_id' => 'country_id']);
    }
}
