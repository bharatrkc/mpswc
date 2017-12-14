<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mm_unit}}".
 *
 * @property integer $id
 * @property string $description
 * @property string $created_by
 * @property string $created
 */
class MmUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mm_unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description'], 'required'],
            [['created'], 'safe'],
            [['description'], 'string', 'max' => 50],
            [['created_by'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created' => 'Created',
        ];
    }
}
