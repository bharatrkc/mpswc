<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_factory_license_under_the_factory_act_1948}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $lin_number
 * @property string $factory_licence_under_if_already_registered_before
 * @property string $application_for_the_registration_of_license_for_the_year
 * @property string $full_name
 * @property string $father_name
 * @property string $address
 * @property string $occupant_status
 * @property string $state
 * @property string $district
 * @property string $division_office
 * @property integer $pincode
 * @property integer $mobile_no
 * @property string $email_id
 * @property integer $aadhar_no
 * @property string $carried_the_factory_last_12_months
 * @property string $carried_factory_during_next_12_months
 * @property string $whether_involves_hazardous_processes
 * @property string $whether_involves_any_dangerous_operation
 * @property string $whether_any_chemical_substance
 * @property string $name
 * @property integer $quantity
 * @property string $value
 * @property string $fee_schedule
 * @property string $maximum_number_of_worker_proposed_to_employed_on_any_one_day
 * @property integer $maximum_number_workers_employed_one_day_during_last_12months
 * @property integer $number_workers_employed_in_the_factory
 * @property string $installed_machinery_power_in_horse_power
 * @property integer $allotment_reference_number
 * @property string $allotment_date_of_approval
 * @property integer $arrangements_reference_number
 * @property string $arrangements_name_of_authority
 * @property string $arrangements_date_of_approval
 * @property integer $plans_reference_number
 * @property string $plans_date_of_approval
 * @property string $description
 * @property string $created
 * @property string $updated
 */
class ServiceFactoryLicenseUnderTheFactoryAct1948 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_factory_license_under_the_factory_act_1948}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'factory_licence_under_if_already_registered_before', 'application_for_the_registration_of_license_for_the_year', 'full_name', 'father_name', 'address', 'occupant_status', 'state', 'district', 'division_office', 'pincode', 'mobile_no', 'email_id',  'carried_factory_during_next_12_months', 'whether_involves_hazardous_processes', 'whether_involves_any_dangerous_operation', 'whether_any_chemical_substance','fee_schedule', 'maximum_number_of_worker_proposed_to_employed_on_any_one_day','number_workers_employed_in_the_factory', 'installed_machinery_power_in_horse_power'], 'required'],
            [['project_id', 'lin_number', 'pincode', 'mobile_no', 'aadhar_no', 'quantity', 'maximum_number_workers_employed_one_day_during_last_12months', 'number_workers_employed_in_the_factory', 'allotment_reference_number', 'arrangements_reference_number', 'plans_reference_number'], 'integer'],
            [['address', 'description'], 'string'],
            [['allotment_date_of_approval', 'arrangements_date_of_approval', 'plans_date_of_approval', 'created', 'updated'], 'safe'],
            [['factory_licence_under_if_already_registered_before', 'application_for_the_registration_of_license_for_the_year', 'full_name', 'father_name', 'occupant_status', 'state', 'district', 'division_office', 'email_id', 'carried_the_factory_last_12_months', 'carried_factory_during_next_12_months', 'whether_involves_hazardous_processes', 'whether_involves_any_dangerous_operation', 'whether_any_chemical_substance', 'name', 'value', 'fee_schedule', 'maximum_number_of_worker_proposed_to_employed_on_any_one_day', 'installed_machinery_power_in_horse_power', 'arrangements_name_of_authority'], 'string', 'max' => 255],
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
            'lin_number' => 'Lin Number',
            'factory_licence_under_if_already_registered_before' => 'Factory Licence Under If Already Registered Before',
            'application_for_the_registration_of_license_for_the_year' => 'Application For The Registration Of License For The Year',
            'full_name' => 'Full Name',
            'father_name' => 'Father Name',
            'address' => 'Address',
            'occupant_status' => 'Occupant Status',
            'state' => 'State',
            'district' => 'District',
            'division_office' => 'Division Office',
            'pincode' => 'Pincode',
            'mobile_no' => 'Mobile No',
            'email_id' => 'Email ID',
            'aadhar_no' => 'Aadhar No',
            'carried_the_factory_last_12_months' => 'Carried The Factory Last 12 Months',
            'carried_factory_during_next_12_months' => 'Carried Factory During Next 12 Months',
            'whether_involves_hazardous_processes' => 'Whether Involves Hazardous Processes',
            'whether_involves_any_dangerous_operation' => 'Whether Involves Any Dangerous Operation',
            'whether_any_chemical_substance' => 'Whether Any Chemical Substance',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'value' => 'Value',
            'fee_schedule' => 'Fee Schedule',
            'maximum_number_of_worker_proposed_to_employed_on_any_one_day' => 'Maximum Number Of Worker Proposed To Employed On  Any One Day',
            'maximum_number_workers_employed_one_day_during_last_12months' => 'Maximum Number Workers Employed One Day During Last 12months',
            'number_workers_employed_in_the_factory' => 'Number Workers Employed In The Factory',
            'installed_machinery_power_in_horse_power' => 'Installed Machinery Power In Horse Power',
            'allotment_reference_number' => 'Allotment Reference Number',
            'allotment_date_of_approval' => 'Allotment Date Of Approval',
            'arrangements_reference_number' => 'Arrangements Reference Number',
            'arrangements_name_of_authority' => 'Arrangements Name Of Authority',
            'arrangements_date_of_approval' => 'Arrangements Date Of Approval',
            'plans_reference_number' => 'Plans Reference Number',
            'plans_date_of_approval' => 'Plans Date Of Approval',
            'description' => 'Description',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
