<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%questionnaire}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $abbr
 * @property string $category
 * @property string $status
 * @property string $remarks_flag
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property Questiongroup[] $questiongroups
 */
class Questionnaire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%questionnaire}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category', 'status', 'remarks_flag', 'created_by', 'updated_by'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['abbr'], 'string', 'max' => 20],
            ['abbr', 'unique'],
            [['category', 'status', 'remarks_flag'], 'string', 'max' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'description',
            'abbr' => 'Abbr',
            'category' => 'Category',
            'status' => 'Status',
            'remarks_flag' => 'Remarks Flag',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestiongroups()
    {
        return $this->hasMany(Questiongroup::className(), ['questionnaire_id' => 'id']);
    }
}
