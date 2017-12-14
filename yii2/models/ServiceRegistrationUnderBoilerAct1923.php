<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_under_boiler_act_1923}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $type_of_boiler
 * @property integer $total_heating_surface_area
 * @property string $name_of_manufacturer
 * @property integer $boiler_economiser_works_number
 * @property string $manufacturing_place
 * @property string $manufacturing_year
 * @property integer $maximum_evaporation
 * @property integer $maximum_working_pressure
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationUnderBoilerAct1923 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_under_boiler_act_1923}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'type_of_boiler', 'total_heating_surface_area', 'name_of_manufacturer', 'boiler_economiser_works_number', 'manufacturing_place', 'manufacturing_year', 'maximum_evaporation', 'maximum_working_pressure'], 'required'],
            [['project_id', 'total_heating_surface_area', 'boiler_economiser_works_number', 'maximum_evaporation', 'maximum_working_pressure'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['type_of_boiler', 'name_of_manufacturer', 'manufacturing_place', 'manufacturing_year'], 'string', 'max' => 255],
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
            'type_of_boiler' => 'Type Of Boiler',
            'total_heating_surface_area' => 'Total Heating Surface Area',
            'name_of_manufacturer' => 'Name Of Manufacturer',
            'boiler_economiser_works_number' => 'Boiler Economiser Works Number',
            'manufacturing_place' => 'Manufacturing Place',
            'manufacturing_year' => 'Manufacturing Year',
            'maximum_evaporation' => 'Maximum Evaporation',
            'maximum_working_pressure' => 'Maximum Working Pressure',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
