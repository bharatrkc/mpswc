<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_mm_line_of_activity".
 *
 * @property integer $id
 * @property string $line_of_activity
 * @property string $sector
 * @property string $pollution_mark
 */
class MmLineOfActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_mm_line_of_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['line_of_activity', 'sector'], 'required'],
            [['line_of_activity', 'sector', 'pollution_mark'], 'string', 'max' => 255],
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
            'pollution_mark' => 'Pollution Mark',
        ];
    }
}
