<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%document_permission}}".
 *
 * @property integer $id
 * @property integer $documentId
 * @property integer $userId
 * @property integer $rights
 *
 * @property InvestorDocument $document
 */
class DocumentPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentId'], 'required'],
            [['documentId', 'userId', 'rights'], 'integer'],
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
            'userId' => 'User ID',
            'rights' => 'Rights',
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
