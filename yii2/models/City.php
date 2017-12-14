<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property integer $id
 * @property integer $district_id
 * @property string $city_code
 * @property string $name
 * @property string $description
 * @property string $em_code
 * @property string $status
 * @property string $created_by
 * @property string $created
 * @property string $updated_by
 * @property string $updated
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'city_code', 'name', 'status', 'created_by', 'created', 'updated_by', 'updated'], 'required'],
            [['id', 'district_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['city_code', 'em_code'], 'string', 'max' => 10],
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
            'district_id' => 'District ID',
            'city_code' => 'City Code',
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
