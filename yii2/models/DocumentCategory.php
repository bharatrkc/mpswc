<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%document_category}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property InvestorDocument[] $investorDocuments
 */
class DocumentCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvestorDocuments()
    {
        return $this->hasMany(InvestorDocument::className(), ['categoryId' => 'id']);
    }
}
