<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%town}}".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $town_code
 * @property string $name
 * @property string $description
 * @property string $em_code
 * @property string $status
 * @property string $created_by
 * @property string $created
 * @property string $updated_by
 * @property string $updated
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%town}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'town_code', 'name', 'status', 'created_by', 'created', 'updated_by', 'updated'], 'required'],
            [['id', 'city_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['town_code', 'em_code'], 'string', 'max' => 10],
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
            'id' => 'ID',
            'city_id' => 'City ID',
            'town_code' => 'Town Code',
            'name' => 'Name',
            'description' => 'Description',
            'em_code' => 'Em Code',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created' => 'Created',
            'updated_by' => 'Updated By',
            'updated' => 'Updated',
        ];
    }
}
