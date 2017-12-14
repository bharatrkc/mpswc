<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%document_log}}".
 *
 * @property integer $id
 * @property integer $documentId
 * @property string $modifiedOn
 * @property integer $modifiedBy
 * @property string $note
 *
 * @property InvestorDocument $document
 */
class DocumentLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentId'], 'required'],
            [['documentId', 'modifiedBy'], 'integer'],
            [['modifiedOn'], 'safe'],
            [['note'], 'string'],
            [['documentId'], 'exist', 'skipOnError' => true, 'targetClass' => InvestorDocument::className(), 'targetAttribute' => ['documentId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'documentId' => 'Document ID',
            'modifiedOn' => 'Modified On',
            'modifiedBy' => 'Modified By',
            'note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(InvestorDocument::className(), ['id' => 'documentId']);
    }
}
