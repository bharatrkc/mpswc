<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_permission_for_engaging_contractor_under_labour_act}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name_of_contractor
 * @property string $name_of_father_husband
 * @property string $address
 * @property integer $pincode
 * @property string $telephone_no
 * @property string $fax_no
 * @property string $email_id
 * @property string $mobile_number
 * @property integer $aadhar_no
 * @property string $dob
 * @property string $district
 * @property string $principal_employer_name_of_establishment
 * @property string $principal_employer_estb_address
 * @property string $principal_employer_type_of_business
 * @property string $principal_employer_certificate_of_registration
 * @property string $principal_employer_date_of_registration
 * @property string $principal_employer_name
 * @property integer $principal_employer_address
 * @property string $principal_employer_mobile_no_of_principal_planner
 * @property integer $principal_employer_email
 * @property integer $contract_workers_name_of_the_work
 * @property string $contract_workers_maximum_number
 * @property string $contract_workers_proposed_start_date
 * @property integer $contract_workers_proposed_end_date
 * @property string $contract_workers_manager_name
 * @property string $contract_workers_manager_address
 * @property string $other_details_contractor_convicted_of_any_crime
 * @property string $other_details_report_crime
 * @property string $other_details_was_any_order_to_suspend_license
 * @property string $other_details_order_date
 * @property string $other_details_has_contractor_worked_any_other_establishment
 * @property string $other_details_name_of_employer
 * @property string $other_details_establishment_name
 * @property string $other_details_nature_of_work
 * @property string $created
 * @property string $updated
 */
class ServicePermissionForEngagingContractorUnderLabourAct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_permission_for_engaging_contractor_under_labour_act}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'name_of_contractor', 'address', 'pincode', 'telephone_no', 'email_id', 'mobile_number', 'aadhar_no', 'dob', 'district', 'principal_employer_name_of_establishment', 'principal_employer_estb_address', 'principal_employer_type_of_business', 'contract_workers_name_of_the_work', 'contract_workers_maximum_number', 'contract_workers_proposed_start_date', 'contract_workers_proposed_end_date'], 'required'],
            [['project_id', 'pincode', 'aadhar_no', 'principal_employer_address', 'principal_employer_email', 'contract_workers_name_of_the_work', 'contract_workers_proposed_end_date'], 'integer'],
            [['dob', 'principal_employer_certificate_of_registration', 'contract_workers_maximum_number', 'contract_workers_proposed_start_date', 'other_details_order_date', 'created', 'updated'], 'safe'],
            [['name_of_contractor', 'name_of_father_husband', 'address', 'telephone_no', 'fax_no', 'email_id', 'mobile_number', 'district', 'principal_employer_name_of_establishment', 'principal_employer_type_of_business', 'principal_employer_date_of_registration', 'principal_employer_mobile_no_of_principal_planner', 'contract_workers_manager_name', 'other_details_was_any_order_to_suspend_license', 'other_details_has_contractor_worked_any_other_establishment', 'other_details_name_of_employer', 'other_details_establishment_name', 'other_details_nature_of_work'], 'string', 'max' => 255],
            [['principal_employer_estb_address', 'principal_employer_name', 'contract_workers_manager_address', 'other_details_contractor_convicted_of_any_crime', 'other_details_report_crime'], 'string', 'max' => 500],
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
            'name_of_contractor' => 'Name Of Contractor',
            'name_of_father_husband' => 'Name Of Father Husband',
            'address' => 'Address',
            'pincode' => 'Pincode',
            'telephone_no' => 'Telephone No',
            'fax_no' => 'Fax No',
            'email_id' => 'Email ID',
            'mobile_number' => 'Mobile Number',
            'aadhar_no' => 'Aadhar No',
            'dob' => 'Dob',
            'district' => 'District',
            'principal_employer_name_of_establishment' => 'Principal Employer Name Of Establishment',
            'principal_employer_estb_address' => 'Principal Employer Estb Address',
            'principal_employer_type_of_business' => 'Principal Employer Type Of Business',
            'principal_employer_certificate_of_registration' => 'Principal Employer Certificate Of Registration',
            'principal_employer_date_of_registration' => 'Principal Employer Date Of Registration',
            'principal_employer_name' => 'Principal Employer Name',
            'principal_employer_address' => 'Principal Employer Address',
            'principal_employer_mobile_no_of_principal_planner' => 'Principal Employer Mobile No Of Principal Planner',
            'principal_employer_email' => 'Principal Employer Email',
            'contract_workers_name_of_the_work' => 'Contract Workers Name Of The Work',
            'contract_workers_maximum_number' => 'Contract Workers Maximum Number',
            'contract_workers_proposed_start_date' => 'Contract Workers Proposed Start Date',
            'contract_workers_proposed_end_date' => 'Contract Workers Proposed End Date',
            'contract_workers_manager_name' => 'Contract Workers Manager Name',
            'contract_workers_manager_address' => 'Contract Workers Manager Address',
            'other_details_contractor_convicted_of_any_crime' => 'Other Details Contractor Convicted Of Any Crime',
            'other_details_report_crime' => 'Other Details Report Crime',
            'other_details_was_any_order_to_suspend_license' => 'Other Details Was Any Order To Suspend License',
            'other_details_order_date' => 'Other Details Order Date',
            'other_details_has_contractor_worked_any_other_establishment' => 'Other Details Has Contractor Worked Any Other Establishment',
            'other_details_name_of_employer' => 'Other Details Name Of Employer',
            'other_details_establishment_name' => 'Other Details Establishment Name',
            'other_details_nature_of_work' => 'Other Details Nature Of Work',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
