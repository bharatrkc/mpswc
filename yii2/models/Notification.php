<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_notification".
 *
 * @property integer $id
 * @property integer $caf_id
 * @property integer $user_id
 * @property string $notification_detail
 * @property string $date_created
 */
class Notification extends \yii\db\ActiveRecord
{
	public $caf_pro;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caf_id', 'user_id'], 'integer'],
            [['notification_detail'], 'string'],
            [['date_created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caf_id' => 'Caf ID',
			'caf_pro' => 'Caf Project',
            'user_id' => 'User ID',
            'notification_detail' => 'Notification Detail',
            'date_created' => 'Date Created',
        ];
    }
}
