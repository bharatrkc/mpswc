<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_company_type".
 *
 * @property integer $id
 * @property integer $company_type_id
 * @property string $name
 */
class CompanyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_company_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_type_id', 'name'], 'required'],
            [['company_type_id'], 'integer'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_type_id' => 'Company Type ID',
            'name' => 'Name',
        ];
    }
}
