<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_authorization_under_ewaste_management_rules}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $date_of_commissioning
 * @property integer $consents_validity
 * @property integer $validity_of_current_authorisation
 * @property string $dismantling_or_recycling_process
 * @property integer $installed_capacity_in_mt_year
 * @property integer $ewaste_processed_during_last_three_years
 * @property string $waste_management
 * @property string $name_of_treatment_storage
 * @property string $details_of_ewaste
 * @property string $occupational_safety_and_health_aspects
 * @property string $details_of_facilities_for_dismantling
 * @property string $created
 * @property string $updated
 */
class ServiceAuthorizationUnderEwasteManagementRules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_authorization_under_ewaste_management_rules}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'date_of_commissioning', 'consents_validity', 'validity_of_current_authorisation', 'dismantling_or_recycling_process', 'installed_capacity_in_mt_year', 'ewaste_processed_during_last_three_years', 'waste_management', 'name_of_treatment_storage', 'details_of_ewaste', 'occupational_safety_and_health_aspects', 'details_of_facilities_for_dismantling'], 'required'],
            [['project_id', 'consents_validity', 'validity_of_current_authorisation', 'installed_capacity_in_mt_year', 'ewaste_processed_during_last_three_years'], 'integer'],
            [['date_of_commissioning', 'created', 'updated'], 'safe'],
            [['dismantling_or_recycling_process', 'name_of_treatment_storage', 'details_of_ewaste', 'occupational_safety_and_health_aspects', 'details_of_facilities_for_dismantling'], 'string', 'max' => 255],
            [['waste_management'], 'string', 'max' => 11],
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
            'date_of_commissioning' => 'Date Of Commissioning',
            'consents_validity' => 'Consents Validity',
            'validity_of_current_authorisation' => 'Validity Of Current Authorisation',
            'dismantling_or_recycling_process' => 'Dismantling Or Recycling Process',
            'installed_capacity_in_mt_year' => 'Installed Capacity In Mt Year',
            'ewaste_processed_during_last_three_years' => 'Ewaste Processed During Last Three Years',
            'waste_management' => 'Waste Management',
            'name_of_treatment_storage' => 'Name Of Treatment Storage',
            'details_of_ewaste' => 'Details Of Ewaste',
            'occupational_safety_and_health_aspects' => 'Occupational Safety And Health Aspects',
            'details_of_facilities_for_dismantling' => 'Details Of Facilities For Dismantling',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
