<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_mm_line_of_activity_sector".
 *
 * @property integer $id
 * @property string $line_of_activity
 * @property string $sector
 */
class MmLineOfActivitySector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_mm_line_of_activity_sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'line_of_activity', 'sector'], 'required'],
            [['id'], 'integer'],
            [['line_of_activity', 'sector'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_of_activity' => 'Line Of Activity',
            'sector' => 'Sector',
        ];
    }
}
