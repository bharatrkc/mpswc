<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tehsil}}".
 *
 * @property integer $id
 * @property integer $district_id
 * @property string $tehsil_code
 * @property string $name
 * @property string $description
 * @property string $block
 * @property string $status
 * @property string $created_by
 * @property string $created
 * @property string $updated_by
 * @property string $updated
 */
class Tehsil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tehsil}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'tehsil_code', 'name', 'status', 'created_by', 'created', 'updated_by', 'updated'], 'required'],
            [['id', 'district_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['tehsil_code'], 'string', 'max' => 10],
            [['name', 'block', 'created_by', 'updated_by'], 'string', 'max' => 50],
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
            'tehsil_code' => 'Tehsil Code',
            'name' => 'Name',
            'description' => 'Description',
            'block' => 'Block',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created' => 'Created',
            'updated_by' => 'Updated By',
            'updated' => 'Updated',
        ];
    }
}
