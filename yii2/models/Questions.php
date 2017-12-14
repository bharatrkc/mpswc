<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%questions}}".
 *
 * @property integer $id
 * @property integer $grp_id
 * @property string $text
 * @property string $desc_desc
 * @property integer $disp_order
 * @property string $render_type
 * @property string $status
 * @property integer $parent_id
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 *
 * @property Answers[] $answers
 * @property Questiongroup $grp
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%questions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grp_id', 'text', 'disp_order', 'render_type', 'status', 'created_by', 'updated_by'], 'required'],
            [['grp_id', 'disp_order', 'parent_id'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['text'], 'string', 'max' => 200],
            [['desc_desc'], 'string', 'max' => 500],
            [['render_type'], 'string', 'max' => 15],
            [['status'], 'string', 'max' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            [['grp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questiongroup::className(), 'targetAttribute' => ['grp_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grp_id' => 'Grp ID',
            'text' => 'Question',
            'desc_desc' => 'Description',
            'disp_order' => 'Disp Order',
            'render_type' => 'Render Type',
            'status' => 'Status',
            'parent_id' => 'Parent Question ID',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrp()
    {
        return $this->hasOne(Questiongroup::className(), ['id' => 'grp_id']);
    }
}
