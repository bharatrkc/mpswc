<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%akvn_master}}".
 *
 * @property string $district
 * @property string $akvn
 */
class AkvnMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%akvn_master}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district', 'akvn'], 'required'],
            [['district'], 'string', 'max' => 41],
            [['akvn'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'district' => 'District',
            'akvn' => 'Akvn',
        ];
    }
}
