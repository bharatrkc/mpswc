<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%answers}}".
 *
 * @property integer $id
 * @property integer $question_id
 * @property string $text
 * @property string $desc_desc
 * @property integer $disp_order
 * @property string $status
 * @property string $dependent_questions
 * @property integer $parent_ans_id
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property Questions $question
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%answers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'disp_order', 'parent_ans_id'], 'integer'],
            [['text', 'disp_order', 'status', 'created_by', 'updated_by'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['text', 'dependent_questions'], 'string', 'max' => 100],
            [['desc_desc'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'text' => 'Text',
            'desc_desc' => 'Desc Desc',
            'disp_order' => 'Disp Order',
            'status' => 'Status',
            'dependent_questions' => 'Dependent Questions',
            'parent_ans_id' => 'Parent Ans ID',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questions::className(), ['id' => 'question_id']);
    }
}
