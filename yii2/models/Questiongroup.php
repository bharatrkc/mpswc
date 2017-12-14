<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%questiongroup}}".
 *
 * @property integer $id
 * @property integer $questionnaire_id
 * @property string $heading
 * @property string $description
 * @property integer $disp_order
 * @property string $category
 * @property string $status
 * @property string $remarks_flag
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property Questionnaire $questionnaire
 */
class Questiongroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%questiongroup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questionnaire_id', 'disp_order'], 'integer'],
            [['heading', 'disp_order', 'category', 'status', 'remarks_flag', 'created_by', 'updated_by'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['heading'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['category', 'status', 'remarks_flag'], 'string', 'max' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            [['questionnaire_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questionnaire::className(), 'targetAttribute' => ['questionnaire_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'questionnaire_id' => 'Questionnaire ID',
            'heading' => 'Heading',
            'description' => 'description',
            'disp_order' => 'Disp Order',
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
    public function getQuestionnaire()
    {
        return $this->hasOne(Questionnaire::className(), ['id' => 'questionnaire_id']);
    }
}
