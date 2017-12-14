<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_factory_building_plan_approval}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $manufacturing_process_will_be_follow
 * @property string $manufacturing_process_involves_hazardous_processes
 * @property string $manufacturing_process_involves_any_dangerous_operation
 * @property string $manufacturing_process_any_chemical_substance
 * @property string $manufacturing_process_provisions_of_establishment
 * @property string $workers_details_workers_employed
 * @property string $workers_details_key_facilities
 * @property string $details_of_machines_any_lift
 * @property string $details_of_machines
 * @property string $job_description_chances_of_falling
 * @property string $emergency_exit_details_chances_of_spreading_hazardous_smoke
 * @property string $construction_for_building
 * @property string $construction_for_roof
 * @property string $industry_under_factory_type_of_factory
 * @property string $industry_under_factory_no_of_workers
 * @property string $created
 * @property string $updated
 */
class ServiceFactoryBuildingPlanApproval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_factory_building_plan_approval}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'manufacturing_process_will_be_follow', 'manufacturing_process_involves_hazardous_processes', 'manufacturing_process_involves_any_dangerous_operation', 'manufacturing_process_any_chemical_substance', 'manufacturing_process_provisions_of_establishment', 'workers_details_workers_employed', 'workers_details_key_facilities', 'details_of_machines_any_lift', 'details_of_machines', 'job_description_chances_of_falling', 'emergency_exit_details_chances_of_spreading_hazardous_smoke', 'construction_for_building', 'construction_for_roof', 'industry_under_factory_type_of_factory', 'industry_under_factory_no_of_workers'], 'required'],

            [['project_id', 'workers_details_workers_employed'], 'integer'],

            [['manufacturing_process_will_be_follow'], 'string'],
            [['created', 'updated'], 'safe'],
            [['manufacturing_process_involves_hazardous_processes', 'manufacturing_process_involves_any_dangerous_operation', 'manufacturing_process_any_chemical_substance', 'manufacturing_process_provisions_of_establishment', 'workers_details_key_facilities', 'details_of_machines_any_lift', 'details_of_machines', 'job_description_chances_of_falling', 'emergency_exit_details_chances_of_spreading_hazardous_smoke', 'construction_for_building', 'construction_for_roof', 'industry_under_factory_type_of_factory', 'industry_under_factory_no_of_workers'], 'string', 'max' => 255],
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
            'manufacturing_process_will_be_follow' => 'Manufacturing Process Will Be Follow',
            'manufacturing_process_involves_hazardous_processes' => 'Manufacturing Process Involves Hazardous Processes',
            'manufacturing_process_involves_any_dangerous_operation' => 'Manufacturing Process Involves Any Dangerous Operation',
            'manufacturing_process_any_chemical_substance' => 'Manufacturing Process Any Chemical Substance',
            'manufacturing_process_provisions_of_establishment' => 'Manufacturing Process Provisions Of Establishment',
            'workers_details_workers_employed' => 'Workers Details Workers Employed',
            'workers_details_key_facilities' => 'Workers Details Key Facilities',
            'details_of_machines_any_lift' => 'Details Of Machines Any Lift',
            'details_of_machines' => 'Details Of Machines',
            'job_description_chances_of_falling' => 'Job Description Chances Of Falling',
            'emergency_exit_details_chances_of_spreading_hazardous_smoke' => 'Emergency Exit Details Chances Of Spreading Hazardous Smoke',
            'construction_for_building' => 'Construction For Building',
            'construction_for_roof' => 'Construction For Roof',
            'industry_under_factory_type_of_factory' => 'Industry Under Factory Type Of Factory',
            'industry_under_factory_no_of_workers' => 'Industry Under Factory No Of Workers',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
