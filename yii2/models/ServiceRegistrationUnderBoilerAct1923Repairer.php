<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_under_boiler_act_1923_repairer}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $service_to_be_availed
 * @property string $class_of_erector
 * @property string $tan
 * @property string $epfo_registration_no
 * @property string $esi_registration_no
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationUnderBoilerAct1923Repairer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_under_boiler_act_1923_repairer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'service_to_be_availed', 'class_of_erector'], 'required'],
            [['project_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['service_to_be_availed', 'class_of_erector', 'tan', 'epfo_registration_no', 'esi_registration_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'service_to_be_availed' => 'Service To Be Availed',
            'class_of_erector' => 'Class Of Erector',
            'tan' => 'Tan',
            'epfo_registration_no' => 'Epfo Registration No',
            'esi_registration_no' => 'Esi Registration No',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
