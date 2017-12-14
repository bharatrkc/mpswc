<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_notifications".
 *
 * @property integer $id
 * @property integer $caf_id
 * @property integer $service_id
 * @property integer $user_id
 * @property string $at_event
 * @property string $notification_detail
 * @property string $date_created
 */
class Notifications extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caf_id', 'service_id', 'user_id'], 'integer'],
            [['notification_detail'], 'string'],
            [['date_created'], 'safe'],
            [['at_event'], 'string', 'max' => 255],
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
            'service_id' => 'Service ID',
            'user_id' => 'User ID',
            'at_event' => 'At Event',
            'notification_detail' => 'Notification Detail',
            'date_created' => 'Date Created',
        ];
    }
   public function scenarios()
 {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['caf_id','service_id','user_id','at_event','notification_detail','date_created']; 
        return $scenarios; 
    }
}
