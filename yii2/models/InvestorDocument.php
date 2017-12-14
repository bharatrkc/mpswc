<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%investor_document}}".
 *
 * @property integer $id
 * @property integer $categoryId
 * @property integer $ownerId
 * @property string $realname
 * @property string $mimeType
 * @property string $created
 * @property string $description
 * @property string $comment
 * @property integer $status
 *
 * @property DocumentLog[] $documentLogs
 * @property DocumentPermission[] $documentPermissions
 * @property DocumentCategory $category
 */
class InvestorDocument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%investor_document}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId', 'ownerId', 'status'], 'integer'],
            [['realname', 'mimeType'], 'required'],
            [['created'], 'safe'],
            [['comment'], 'string'],
            [['realname', 'mimeType', 'description'], 'string', 'max' => 255],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentCategory::className(), 'targetAttribute' => ['categoryId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryId' => 'Category ID',
            'ownerId' => 'Owner ID',
            'realname' => 'Realname',
            'mimeType' => 'Mime Type',
            'created' => 'Created',
            'description' => 'Description',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentLogs()
    {
        return $this->hasMany(DocumentLog::className(), ['documentId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentPermissions()
    {
        return $this->hasMany(DocumentPermission::className(), ['documentId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(DocumentCategory::className(), ['id' => 'categoryId']);
    }
}
