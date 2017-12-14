<?php
namespace app\models;

use Yii;
use yii\validators\Validator;

/**
 * This is the model class for table "{{%caf}}".
 *
 * @property integer $id
 * @property integer $investor_id
 * @property string $unit_name
 * @property string $constitution
 * @property string $registration_no
 * @property string $registration_date
 * @property string $company_website
 * @property string $pan_number
 * @property string $contact_name
 * @property string $contact_designation
 * @property string $contact_mobile
 * @property string $contact_email
 * @property string $contact_phone_no
 * @property string $contact_fax_no
 * @property string $manager_name
 * @property string $manager_s_d_w_o
 * @property string $manager_address
 * @property string $manager_mobile
 * @property string $manager_email
 * @property string $applicant_name
 * @property string $applicant_s_d_w_o
 * @property string $applicant_dob
 * @property string $applicant_designation
 * @property string $applicant_aadhar_no
 * @property string $applicant_mobile
 * @property string $applicant_email
 * @property string $applicant_phone_no
 * @property string $applicant_fax_no
 * @property string $correspondence_address_line1
 * @property string $correspondence_address_line2
 * @property string $correspondence_address_district
 * @property string $correspondence_address_state
 * @property string $correspondence_address_country
 * @property string $correspondence_address_pincode
 * @property string $correspondence_address_mobile
 * @property string $correspondence_address_email
 * @property string $correspondence_address_phone_no
 * @property string $correspondence_address_fax_no
 * @property string $registered_office_address_line1
 * @property string $registered_office_address_line2
 * @property string $registered_office_address_district
 * @property string $registered_office_address_state
 * @property string $registered_office_address_country
 * @property string $registered_office_address_pincode
 * @property string $registered_office_address_fax_no
 * @property string $project_name
 * @property string $category
 * @property string $sector
 * @property string $line_of_activity
 * @property string $pollution_category
 * @property string $project_new_or_expansion
 * @property string $proposed_production_date
 * @property string $women_entrepreneur
 * @property string $differently_abled
 * @property string $minority
 * @property string $direct_male
 * @property string $direct_female
 * @property string $indirect_male
 * @property string $indirect_female
 * @property string $value_of_land
 * @property string $value_of_building
 * @property string $value_of_plant_and_machinery
 * @property string $total_project_value
 * @property string $industry_type
 * @property string $type_of_land
 * @property string $name_of_industrial_area
 * @property string $land_use_type
 * @property string $plot_number
 * @property string $proposed_site_address_line1
 * @property string $proposed_site_district
 * @property string $proposed_site_tehsil
 * @property string $proposed_site_area
 * @property string $proposed_site_pincode
 * @property string $proposed_site_telephone
 * @property string $proposed_site_total_extend_of_site_area
 * @property string $proposed_site_area_for_development
 * @property string $proposed_site_total_built_area
 * @property string $proposed_site_height_of_building
 * @property string $proposed_site_building_plan
 * @property string $line_manufacture_product_name
 * @property string $line_manufacture_quantity
 * @property string $line_manufacture_unit
 * @property string $raw_materials_item
 * @property string $raw_materials_quantity
 * @property string $raw_materials_unit
 * @property string $production_capacity
 * @property string $production_capacity_unit
 * @property string $created
 * @property string $updated
 */
class Caf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%caf}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['unit_name', 'constitution', 'registration_no', 'registration_date', 'pan_number', 'contact_name', 'contact_designation', 'contact_mobile', 'contact_email', 
			'manager_name', 'manager_s_d_w_o', 'manager_address', 'manager_mobile', 'manager_email', 'applicant_name', 'applicant_s_d_w_o', 'applicant_dob', 'applicant_designation', 'applicant_aadhar_no', 'applicant_mobile', 'applicant_email', 
			'correspondence_address_line1', 'correspondence_address_district', 'correspondence_address_state', 'correspondence_address_country', 'correspondence_address_pincode', 'correspondence_address_mobile', 'correspondence_address_email', 
			'registered_office_address_line1', 'registered_office_address_line2', 'registered_office_address_district', 'registered_office_address_state', 'registered_office_address_country', 'registered_office_address_pincode', 
			'project_name', 'category', 'sector', 'line_of_activity', 'pollution_category', 'project_new_or_expansion', 'proposed_production_date', 'women_entrepreneur', 'differently_abled', 'minority', 'direct_male', 'direct_female', 'indirect_male', 'indirect_female', 
			'value_of_land', 'value_of_building', 'value_of_plant_and_machinery', 'total_project_value', 
			'industry_type', 'type_of_land', 'name_of_industrial_area', 'land_use_type', 
				
			'plot_number', 'proposed_site_address_line1', 'proposed_site_district', 'proposed_site_tehsil', 'proposed_site_area', 'proposed_site_pincode', 'proposed_site_total_extend_of_site_area', 'proposed_site_area_for_development', 'proposed_site_total_built_area', 'proposed_site_height_of_building', 'proposed_site_building_plan', 'line_manufacture_product_name', 'line_manufacture_quantity', 'line_manufacture_unit', 'raw_materials_item', 'raw_materials_quantity', 'raw_materials_unit', 'production_capacity', 'production_capacity_unit'], 'required', 'message' => 'Required field'],

			// email has to be a valid email address 
			['contact_email', 'email'],
			['manager_email', 'email'],
			['applicant_email', 'email'],
			['correspondence_address_email', 'email'],
				 

			[['plot_number', 'proposed_site_pincode', 'correspondence_address_pincode', 'registered_office_address_pincode', 'contact_mobile', 'manager_mobile', 'applicant_mobile', 'correspondence_address_mobile', 'indirect_female', 'indirect_male', 'direct_female', 'direct_male', 'contact_phone_no', 'contact_fax_no', 'applicant_phone_no', 'applicant_fax_no', 'correspondence_address_phone_no', 'correspondence_address_fax_no', 'proposed_site_telephone'], 'integer', 'message' => 'Invalid value'], 

				
            [['value_of_land', 'value_of_building', 'value_of_plant_and_machinery', 'total_project_value', 'proposed_site_total_extend_of_site_area', 'proposed_site_area_for_development', 'proposed_site_total_built_area', 'proposed_site_height_of_building', 'line_manufacture_quantity', 'raw_materials_quantity', 'production_capacity'], 'double', 'message' => 'Invalid value'], 

			
		 	[['contact_mobile', 'manager_mobile', 'applicant_mobile', 'correspondence_address_mobile'], 'match', 'pattern' => '/^[0-9]{10}$/'],

			[['unit_name', 'constitution', 'registration_no', 'registration_date', 'pan_number', 'contact_name', 'contact_designation', 'contact_mobile', 
			'manager_name', 'manager_s_d_w_o', 'manager_address', 'manager_mobile', 'applicant_name', 'applicant_s_d_w_o', 'applicant_dob', 'applicant_designation', 'applicant_aadhar_no', 'applicant_mobile', 
			'correspondence_address_line1', 'correspondence_address_line2', 'correspondence_address_district', 'correspondence_address_state', 'correspondence_address_country', 'correspondence_address_pincode', 'correspondence_address_mobile', 
			'registered_office_address_line1', 'registered_office_address_district', 'registered_office_address_state', 'registered_office_address_country', 'registered_office_address_pincode', 
			'project_name', 'category', 'pollution_category', 'project_new_or_expansion', 'proposed_production_date', 'women_entrepreneur', 'differently_abled', 'minority', 'direct_male', 'direct_female', 'indirect_male', 'indirect_female', 
			'value_of_land', 'value_of_building', 'value_of_plant_and_machinery', 'total_project_value', 
			'industry_type', 'type_of_land', 'name_of_industrial_area', 'land_use_type', 
				
			'plot_number', 'proposed_site_address_line1', 'proposed_site_district', 'proposed_site_tehsil', 'proposed_site_area', 'proposed_site_pincode', 'proposed_site_total_extend_of_site_area', 'proposed_site_area_for_development', 'proposed_site_total_built_area', 'proposed_site_height_of_building', 'proposed_site_building_plan', 'line_manufacture_product_name', 'line_manufacture_quantity', 'line_manufacture_unit', 'raw_materials_item', 'raw_materials_quantity', 'raw_materials_unit', 'production_capacity', 'production_capacity_unit'], 'match', 'pattern' => '/^[-\w\s\+\,\_\.\&]+$/', 'message' => 'Entered special characters not allowed'],
				
			
			['correspondence_address_pincode', 'match', 'pattern' => '/^[1-9][0-9]{5}$/', 'message' => 'Invalid Pincode'],
			['registered_office_address_pincode', 'match', 'pattern' => '/^[1-9][0-9]{5}$/', 'message' => 'Invalid Pincode'],
			['proposed_site_pincode', 'match', 'pattern' => '/^[1-9][0-9]{5}$/', 'message' => 'Invalid Pincode'],

			[['unit_name', 'constitution', 'registration_no', 'registration_date', 'company_website', 'pan_number', 'contact_name', 'contact_designation', 'contact_mobile', 'contact_phone_no', 'contact_fax_no', 'manager_name', 'manager_s_d_w_o', 'manager_address', 'manager_mobile', 'applicant_name', 'applicant_s_d_w_o', 'applicant_dob', 'applicant_designation', 'applicant_aadhar_no', 'applicant_mobile', 'applicant_phone_no', 'applicant_fax_no', 'correspondence_address_line1', 'correspondence_address_line2', 'correspondence_address_district', 'correspondence_address_state', 'correspondence_address_country', 'correspondence_address_pincode', 'correspondence_address_mobile', 'correspondence_address_phone_no', 'correspondence_address_fax_no', 'registered_office_address_line1', 'registered_office_address_line2', 'registered_office_address_district', 'registered_office_address_state', 'registered_office_address_country', 'registered_office_address_pincode', 'registered_office_address_fax_no', 'project_name', 'category', 'sector', 'line_of_activity', 'pollution_category', 'project_new_or_expansion', 'proposed_production_date', 'women_entrepreneur', 'differently_abled', 'minority', 'direct_male', 'direct_female', 'indirect_male', 'indirect_female', 'value_of_land', 'value_of_building', 'value_of_plant_and_machinery', 'total_project_value', 'industry_type', 'type_of_land', 'name_of_industrial_area', 'land_use_type', 'plot_number', 'proposed_site_address_line1', 'proposed_site_district', 'proposed_site_tehsil', 'proposed_site_area', 'proposed_site_pincode', 'proposed_site_telephone', 'proposed_site_total_extend_of_site_area', 'proposed_site_area_for_development', 'proposed_site_total_built_area', 'proposed_site_height_of_building', 'proposed_site_building_plan', 'line_manufacture_product_name', 'line_manufacture_quantity', 'line_manufacture_unit', 'raw_materials_item', 'raw_materials_quantity', 'raw_materials_unit', 'production_capacity', 'production_capacity_unit'],'filter','filter'=>'\yii\helpers\HtmlPurifier::process'], 
			
			['pan_number', 'match', 'pattern' => '/^[\w]{3}(p|P|c|C|h|H|f|F|a|A|t|T|b|B|l|L|j|J|g|G)[\w][\d]{4}[\w]{1}$/i'], 
			
            ['company_website', 'url', 'defaultScheme' => 'http'],

			
            [['applicant_aadhar_no'], 'integer',  'message' => 'Invalid value'],
			
			
			[['registration_date', 'applicant_dob', 'proposed_production_date'], 'date', 'format' => 'php:d-m-Y'],
			
			['applicant_aadhar_no', 'match', 'pattern' => '/^\s*[+-]?\d{12}\s*$/'],
			['applicant_aadhar_no', 'validateAdhaar', 'skipOnError' => false],


			[['unit_name', 'registration_no', 'contact_name', 'contact_designation', 'manager_name', 'manager_s_d_w_o', 'manager_address', 'applicant_name', 'applicant_s_d_w_o', 'applicant_designation', 
			'correspondence_address_line1', 'correspondence_address_district', 'correspondence_address_state', 'registered_office_address_line1', 'registered_office_address_line2', 'registered_office_address_district', 'registered_office_address_state', 'registered_office_address_pincode', 'project_name', 'category', 'pollution_category', 'direct_male', 'direct_female', 'indirect_male', 'indirect_female', 'plot_number', 'proposed_site_address_line1', 'line_manufacture_product_name', 'line_manufacture_unit', 'raw_materials_item', 'raw_materials_unit','proposed_site_area', 'production_capacity_unit'],'match','pattern'=>'/^.{0,255}$/','message'=>"Value is too lengthy"],
            
           [['contact_phone_no','contact_fax_no','applicant_phone_no','correspondence_address_phone_no', 'applicant_fax_no','correspondence_address_fax_no'], 'match', 'pattern'=>'/^.{0,20}$/', 'message'=>"Value is too lengthy"]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'investor_id' => 'Investor ID',
            'unit_name' => 'Unit Name',
            'constitution' => 'Constitution',
            'registration_no' => 'Registration No',
            'registration_date' => 'Registration Date',
            'company_website' => 'Company Website',
            'pan_number' => 'Pan Number',
            'contact_name' => 'Name',
            'contact_designation' => 'Designation',
            'contact_mobile' => 'Mobile',
            'contact_email' => 'Email ID',
            'contact_phone_no' => 'Phone No.',
            'contact_fax_no' => 'Fax No.',
            'manager_name' => 'Name',
            'manager_s_d_w_o' => 'S/o.D/o.W/o',
            'manager_address' => 'Address',
            'manager_mobile' => 'Mobile No.',
            'manager_email' => 'Email ID',
            'applicant_name' => 'Name',
            'applicant_s_d_w_o' => 'S/o.D/o.W/o',
            'applicant_dob' => 'Date of Birth',
            'applicant_designation' => 'Designation',
            'applicant_aadhar_no' => 'Aadhar No',
            'applicant_mobile' => 'Mobile No.',
            'applicant_email' => 'Email ID',
            'applicant_phone_no' => 'Phone No.',
            'applicant_fax_no' => 'Fax No.',
            'correspondence_address_line1' => 'Address Line 1',
            'correspondence_address_line2' => 'Address Line 2',
            'correspondence_address_district' => 'District',
            'correspondence_address_state' => 'State',
            'correspondence_address_country' => 'Country',
            'correspondence_address_pincode' => 'Pincode',
            'correspondence_address_mobile' => 'Mobile No.',
            'correspondence_address_email' => 'Email No.',
            'correspondence_address_phone_no' => 'Phone No.',
            'correspondence_address_fax_no' => 'Fax No.',
            'registered_office_address_line1' => 'Address Line 1',
            'registered_office_address_line2' => 'Address Line 2',
            'registered_office_address_district' => 'District',
            'registered_office_address_state' => 'State',
            'registered_office_address_country' => 'Country',
            'registered_office_address_pincode' => 'Pincode',
            'registered_office_address_fax_no' => 'Fax No',
            'project_name' => 'Project Name',
            'category' => 'Category',
            'sector' => 'Sector',
            'line_of_activity' => 'Line Of Activity',
            'pollution_category' => 'Pollution Category',
            'project_new_or_expansion' => 'Project New Or Expansion',
            'proposed_production_date' => 'Proposed Production Date',
            'women_entrepreneur' => 'Women Entrepreneur',
            'differently_abled' => 'Differently Abled',
            'minority' => 'Minority',
            'direct_male' => 'Male',
            'direct_female' => 'Female',
            'indirect_male' => 'Male',
            'indirect_female' => 'Female',
            'value_of_land' => 'Value Of Land',
            'value_of_building' => 'Value Of Building',
            'value_of_plant_and_machinery' => 'Value Of Plant And Machinery',
            'total_project_value' => 'Total Project Value',
            'industry_type' => 'Industry Type',
            'type_of_land' => 'Type Of Land',
            'name_of_industrial_area' => 'Name Of Industrial Area',
            'land_use_type' => 'Land Use Type',
            'plot_number' => 'Plot Number',
            'proposed_site_address_line1' => 'Address Line1',
            'proposed_site_district' => 'District',
            'proposed_site_tehsil' => 'Tehsil',
            'proposed_site_area' => 'Village/Area',
            'proposed_site_pincode' => 'Pincode',
            'proposed_site_telephone' => 'Telephone',
            'proposed_site_total_extend_of_site_area' => 'Total Extent of Site Area (in Sq. mts)',
            'proposed_site_area_for_development' => 'Proposed Area for Development(in Sq. mts)',
            'proposed_site_total_built_area' => 'Total Built up Area(in Sq. mts)',
            'proposed_site_height_of_building' => 'Height of the Building(In mts)',
            'proposed_site_building_plan' => 'Building Plan Approval',
            'line_manufacture_product_name' => 'Product Name',
            'line_manufacture_quantity' => 'Quantity (Per Annum)',
            'line_manufacture_unit' => 'Unit',
            'raw_materials_item' => 'Item',
            'raw_materials_quantity' => 'Quantity (Per Annum)',
            'raw_materials_unit' => 'Unit',
            'production_capacity' => 'Production Capacity',
            'production_capacity_unit' => 'Unit',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

	
	
	public function beforeSave($insert = true) {

		$this->registration_date = date('Y-m-d', strtotime($this->registration_date)); 
		$this->proposed_production_date = date('Y-m-d', strtotime($this->proposed_production_date)); 	
		$this->applicant_dob = date('Y-m-d', strtotime($this->applicant_dob)); 	
		
		
		$project_id = Yii::$app->getRequest()->getQueryParam('projectId');
		$this->project_id = $project_id; 	
			

		$user_id = Yii::$app->user->identity->id; 
		 
		$this->investor_id = $user_id;   

		return parent::beforeSave($insert);
	}

	
    public function validateAdhaar($attribute, $params, $validator) { 

		$aadhar_no = $this->$attribute; 

		settype($aadhar_no, "string");
		$expectedDigit = substr($aadhar_no, -1);
		$actualDigit = $this->CheckSumAadharDigit(substr($aadhar_no, 0, -1));
		$valid = ($expectedDigit == $actualDigit) ? $expectedDigit == $actualDigit : 0;

		$isValid = false; 
		if ($valid == 1) {
			$isValid = true;
		} 
		if($isValid==false) {
			$this->addError($attribute, 'Adhaar Number is not valid'); 
		}

    }

	public function CheckSumAadharDigit($partialx) {  
             
		$dihedral = array(
                array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
                array(1, 2, 3, 4, 0, 6, 7, 8, 9, 5),
                array(2, 3, 4, 0, 1, 7, 8, 9, 5, 6),
                array(3, 4, 0, 1, 2, 8, 9, 5, 6, 7),
                array(4, 0, 1, 2, 3, 9, 5, 6, 7, 8),
                array(5, 9, 8, 7, 6, 0, 4, 3, 2, 1),
                array(6, 5, 9, 8, 7, 1, 0, 4, 3, 2),
                array(7, 6, 5, 9, 8, 2, 1, 0, 4, 3),
                array(8, 7, 6, 5, 9, 3, 2, 1, 0, 4),
                array(9, 8, 7, 6, 5, 4, 3, 2, 1, 0) );
                
		$permutation = array(
                array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
                array(1, 5, 7, 6, 2, 8, 3, 0, 9, 4),
                array(5, 8, 0, 3, 7, 9, 6, 1, 4, 2),
                array(8, 9, 1, 6, 0, 4, 3, 5, 2, 7),
                array(9, 4, 5, 3, 1, 2, 6, 8, 7, 0),
                array(4, 2, 8, 6, 5, 7, 3, 9, 0, 1),
                array(2, 7, 9, 3, 8, 0, 6, 4, 1, 5),
                array(7, 0, 4, 6, 9, 1, 3, 2, 5, 8)  );

		$inverse = array(0, 4, 3, 2, 1, 5, 6, 7, 8, 9);             
             
			settype($partialx, "string");
			$partialx = strrev($partialx);
			$digitIndex = 0;
			for ($i = 0; $i < strlen($partialx); $i++) {
                    $digitIndex = $dihedral[$digitIndex][$permutation[($i + 1) % 8][$partialx[$i]]];
			}

		return $inverse[$digitIndex];
	}
}
