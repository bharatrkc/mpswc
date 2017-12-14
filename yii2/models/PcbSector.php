<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pcb_sector}}".
 *
 * @property integer $id
 * @property string $sector
 */
class PcbSector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pcb_sector}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector'], 'required'],
            [['sector'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector' => 'Sector',
        ];
    }
}
