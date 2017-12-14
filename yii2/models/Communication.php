<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_communication".
 *
 * @property integer $id
 * @property integer $caf_id
 * @property integer $user_id
 * @property string $communication_detail
 * @property string $date_created
 */
class Communication extends \yii\db\ActiveRecord
{
	public $caf_pro;
	public $service_id;
	public $service_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_communication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caf_id', 'user_id'], 'integer'],
            [['communication_detail'], 'string'],
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
            'communication_detail' => 'Communication Detail',
            'date_created' => 'Date Created',
        ];
    }
}
