<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_consent_to_establish}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $electricity_company_name
 * @property string $consumer_no
 * @property string $on_east
 * @property string $on_west
 * @property string $on_north
 * @property string $on_south
 * @property integer $no_of_pumps
 * @property integer $tube_wells
 * @property integer $bore_wells
 * @property integer $latitude
 * @property integer $longitude
 * @property integer $capacity_of_all
 * @property string $nationality
 * @property string $production_date
 * @property string $plant_commission
 * @property string $tsdf_name
 * @property string $cetp_name
 * @property integer $licence_ssi
 * @property integer $area
 * @property string $plantation_open
 * @property integer $source_of_water_supply
 * @property integer $fresh_water_consumption
 * @property integer $waste_water_generation
 * @property integer $industrial_domestic
 * @property integer $waste_water_discharge
 * @property string $ultimate_receiving_body
 * @property string $hazd_waste_storage
 * @property string $critical_polluted_area
 * @property integer $distance_from_residential
 * @property integer $distance_from_eco_sensitive
 * @property integer $distance_from_highway
 * @property integer $premise_area_sqmtr
 * @property string $industrial_estate_in_notified_area
 * @property string $env_clearance
 * @property string $moef_seiaa
 * @property string $application_date
 * @property string $sector_of_the_Industry
 * @property string $air_water_hazardous
 * @property string $view_pdfs_files
 * @property string $cte_on_east
 * @property string $cte_on_west
 * @property string $cte_on_north
 * @property string $cte_on_south
 * @property string $noc_cce_fees
 * @property string $purpose_of_this_application
 * @property string $any_relevant_information_to_be_mentioned
 * @property string $water_etps_ultimate_final_body
 * @property integer $water_etps_discharge_point
 * @property string $water_etps_disposal_mode
 * @property string $water_etps_for_domestic
 * @property string $water_etps_disposal_details
 * @property string $water_etps_fresh_wc_klpd
 * @property integer $water_etps_wwg_klpd
 * @property string $water_etps_tube_wells
 * @property string $water_etps_bore_wells
 * @property string $water_etps_capacity_hp
 * @property string $water_etps_cetp_member
 * @property string $water_etps_water_source
 * @property string $water_etps_etp_stp_chamber
 * @property integer $water_etps_capacity
 * @property string $water_etps_units
 * @property string $water_etps_date_of_commissioning
 * @property string $water_etps_remarks
 * @property string $wc_watCd
 * @property string $wc_watSrc
 * @property integer $wc_kls_day
 * @property integer $wc_wwg
 * @property string $wc_remarks
 * @property string $air_stack_emission_type
 * @property string $air_stack_attached_to
 * @property integer $air_stack_hgt_mtrs
 * @property string $air_stack_remarks_capacity
 * @property string $air_stack_smf
 * @property string $air_stack_fuel_used
 * @property string $air_stack_apc
 * @property integer $air_stack_diameter
 * @property integer $air_stack_cons_hour_unit
 * @property string $air_stack_air_pollution_control_measures
 * @property string $hazardous_waste_category
 * @property string $hazardous_waste_name
 * @property integer $hazardous_waste_qty_yr
 * @property string $hazardous_waste_unit
 * @property string $hazardous_waste_apc
 * @property string $hazardous_waste_management_of_hazardous_waste_disposal
 * @property string $raw_material_product_name
 * @property string $raw_material_unit
 * @property integer $raw_material_cte_quantity
 * @property integer $raw_material_applied_quantity
 * @property string $raw_material_remarks
 * @property string $raw_material_apc
 * @property string $created
 * @property string $updated
 */
class ServiceConsentToEstablish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_consent_to_establish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'electricity_company_name', 'consumer_no', 'on_east', 'on_west', 'on_north', 'on_south', 'no_of_pumps', 'tube_wells', 'bore_wells', 'latitude', 'longitude', 'capacity_of_all', 'nationality', 'production_date', 'plant_commission', 'tsdf_name', 'cetp_name', 'licence_ssi', 'area', 'plantation_open', 'source_of_water_supply', 'fresh_water_consumption', 'waste_water_generation', 'industrial_domestic', 'waste_water_discharge', 'ultimate_receiving_body', 'critical_polluted_area', 'distance_from_residential', 'distance_from_eco_sensitive', 'distance_from_highway', 'premise_area_sqmtr', 'industrial_estate_in_notified_area', 'moef_seiaa', 'application_date', 'sector_of_the_Industry', 'view_pdfs_files', 'cte_on_east', 'cte_on_west', 'cte_on_north', 'cte_on_south', 'noc_cce_fees', 'purpose_of_this_application', 'any_relevant_information_to_be_mentioned', 'water_etps_ultimate_final_body', 'water_etps_discharge_point', 'water_etps_disposal_mode', 'water_etps_for_domestic', 'water_etps_disposal_details', 'water_etps_fresh_wc_klpd', 'water_etps_wwg_klpd', 'water_etps_tube_wells', 'water_etps_bore_wells', 'water_etps_capacity_hp', 'water_etps_cetp_member', 'water_etps_water_source', 'water_etps_etp_stp_chamber', 'water_etps_capacity', 'water_etps_units', 'water_etps_date_of_commissioning', 'water_etps_remarks', 'wc_watCd', 'wc_watSrc', 'wc_kls_day', 'wc_wwg', 'wc_remarks', 'air_stack_emission_type', 'air_stack_attached_to', 'air_stack_hgt_mtrs', 'air_stack_remarks_capacity', 'air_stack_smf', 'air_stack_fuel_used', 'air_stack_diameter', 'air_stack_cons_hour_unit', 'air_stack_air_pollution_control_measures', 'hazardous_waste_category', 'hazardous_waste_name', 'hazardous_waste_qty_yr', 'hazardous_waste_unit', 'hazardous_waste_management_of_hazardous_waste_disposal'], 'required'],
			//, 'raw_material_product_name', 'raw_material_unit', 'raw_material_cte_quantity', 'raw_material_applied_quantity', 'raw_material_remarks'

            [['consumer_no', 'project_id', 'no_of_pumps', 'tube_wells', 'bore_wells', 'latitude', 'longitude', 'capacity_of_all', 'licence_ssi', 'area', 'source_of_water_supply', 'fresh_water_consumption', 'waste_water_generation', 'industrial_domestic', 'waste_water_discharge', 'distance_from_residential', 'distance_from_eco_sensitive', 'distance_from_highway', 'premise_area_sqmtr', 'water_etps_discharge_point', 'water_etps_wwg_klpd', 'water_etps_capacity', 'wc_kls_day', 'wc_wwg', 'air_stack_hgt_mtrs', 'air_stack_diameter', 'air_stack_cons_hour_unit', 'hazardous_waste_qty_yr', 'raw_material_cte_quantity', 'raw_material_applied_quantity',  'plantation_open'], 'integer'],

            [['production_date', 'plant_commission', 'application_date', 'created', 'updated'], 'safe'],
            [['purpose_of_this_application', 'raw_material_remarks'], 'string'],
            [['electricity_company_name', 'on_east', 'on_west', 'on_north', 'on_south', 'nationality', 'tsdf_name', 'cetp_name', 'ultimate_receiving_body', 'critical_polluted_area', 'industrial_estate_in_notified_area', 'moef_seiaa', 'sector_of_the_Industry', 'view_pdfs_files', 'cte_on_east', 'cte_on_west', 'cte_on_north', 'cte_on_south', 'noc_cce_fees', 'any_relevant_information_to_be_mentioned', 'water_etps_ultimate_final_body', 'water_etps_disposal_mode', 'water_etps_for_domestic', 'water_etps_disposal_details', 'water_etps_fresh_wc_klpd', 'water_etps_tube_wells', 'water_etps_bore_wells', 'water_etps_capacity_hp', 'water_etps_cetp_member', 'water_etps_water_source', 'water_etps_etp_stp_chamber', 'water_etps_units', 'water_etps_date_of_commissioning', 'water_etps_remarks', 'wc_watCd', 'wc_watSrc', 'wc_remarks', 'air_stack_emission_type', 'air_stack_attached_to', 'air_stack_remarks_capacity', 'air_stack_smf', 'air_stack_fuel_used', 'air_stack_air_pollution_control_measures', 'hazardous_waste_category', 'hazardous_waste_name', 'hazardous_waste_unit', 'hazardous_waste_management_of_hazardous_waste_disposal', 'raw_material_product_name', 'raw_material_unit'], 'string', 'max' => 255],


			/*
			[['electricity_company_name', 'consumer_no', 'on_east', 'on_west', 'on_north', 'on_south', 'no_of_pumps', 'tube_wells', 'bore_wells', 'latitude', 'longitude', 'capacity_of_all', 'nationality', 'production_date', 'plant_commission', 'tsdf_name', 'cetp_name', 'licence_ssi', 'area', 'plantation_open', 'source_of_water_supply', 'fresh_water_consumption', 'waste_water_generation', 'industrial_domestic', 'waste_water_discharge', 'ultimate_receiving_body', 'hazd_waste_storage', 'critical_polluted_area', 'distance_from_residential', 'distance_from_eco_sensitive', 'distance_from_highway', 'premise_area_sqmtr', 'industrial_estate_in_notified_area', 'env_clearance', 'moef_seiaa', 'application_date', 'sector_of_the_Industry', 'air_water_hazardous', 'view_pdfs_files', 'cte_on_east', 'cte_on_west', 'cte_on_north', 'cte_on_south', 'noc_cce_fees', 'purpose_of_this_application', 'any_relevant_information_to_be_mentioned', 'water_etps_ultimate_final_body', 'water_etps_discharge_point', 'water_etps_disposal_mode', 'water_etps_for_domestic', 'water_etps_disposal_details', 'water_etps_fresh_wc_klpd', 'water_etps_wwg_klpd', 'water_etps_tube_wells', 'water_etps_bore_wells', 'water_etps_capacity_hp', 'water_etps_cetp_member', 'water_etps_water_source', 'water_etps_etp_stp_chamber', 'water_etps_capacity', 'water_etps_units', 'water_etps_date_of_commissioning', 'water_etps_remarks', 'wc_watCd', 'wc_watSrc', 'wc_kls_day', 'wc_wwg', 'wc_remarks', 'air_stack_emission_type', 'air_stack_attached_to', 'air_stack_hgt_mtrs', 'air_stack_remarks_capacity', 'air_stack_smf', 'air_stack_fuel_used', 'air_stack_apc', 'air_stack_diameter', 'air_stack_cons_hour_unit', 'air_stack_air_pollution_control_measures', 'hazardous_waste_category', 'hazardous_waste_name', 'hazardous_waste_qty_yr', 'hazardous_waste_unit', 'hazardous_waste_apc', 'hazardous_waste_management_of_hazardous_waste_disposal', 'raw_material_product_name', 'raw_material_unit', 'raw_material_cte_quantity', 'raw_material_applied_quantity', 'raw_material_remarks', 'raw_material_apc'], 'match', 'pattern' => '/^[-\w\s\,]+$/', 'message' => 'Special characters not allowed'], 
			*/

			[['production_date'], 'date', 'format' => 'php:d-m-Y'],
			[['plant_commission'], 'date', 'format' => 'php:d-m-Y'],
			[['application_date'], 'date', 'format' => 'php:d-m-Y'],
			[['water_etps_date_of_commissioning'], 'date', 'format' => 'php:d-m-Y'], 

			
			['production_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],	
			['plant_commission', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],	
			['application_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],	
			['water_etps_date_of_commissioning', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],
				

			['env_clearance', 'boolean'],
			['hazd_waste_storage', 'boolean'],
			['air_water_hazardous', 'boolean'], 
			['air_stack_apc', 'boolean'],  
			['hazardous_waste_apc', 'boolean'],  
			['raw_material_apc', 'boolean'],
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
            'electricity_company_name' => 'Electricity Company Name/Address',
            'consumer_no' => 'Consumer No(Electric Meter)',
            'on_east' => 'On East',
            'on_west' => 'On West',
            'on_north' => 'On North',
            'on_south' => 'On South',
            'no_of_pumps' => 'No Of Pumps',
            'tube_wells' => 'Tube Wells',
            'bore_wells' => 'Bore Wells',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'capacity_of_all' => 'Capacity Of All',
            'nationality' => 'Nationality',
            'production_date' => 'Production Date',
            'plant_commission' => 'Plant Commission',
            'tsdf_name' => 'TSDF Name',
            'cetp_name' => 'CETP Name',
            'licence_ssi' => 'Licence SSI/IEM No.',
            'area' => 'Area in Sq Mtr',
            'plantation_open' => 'Plantation Open',
            'source_of_water_supply' => 'Source of Water Supply Premise Area-SqMtr',
            'fresh_water_consumption' => 'Fresh Water Consumption(KLPD)',
            'waste_water_generation' => 'Waste Water Generation',
            'industrial_domestic' => 'Industrial Domestic',
            'waste_water_discharge' => 'Waste Wtr Discharge Pt',
            'ultimate_receiving_body' => 'Ultimate Receiving Body',
            'hazd_waste_storage' => 'Hazd Wst Storage',
            'critical_polluted_area' => 'Critical Polluted Area',
            'distance_from_residential' => 'Distance from Residential',
            'distance_from_eco_sensitive' => 'Distance From Eco Sensitive',
            'distance_from_highway' => 'Distance From Highway',
            'premise_area_sqmtr' => 'Premise Area-SqMtr',
            'industrial_estate_in_notified_area' => 'Does it fall in? In Industrial Estate In Notified Area In SIDC, I/A Not in Any of these',
            'env_clearance' => 'Env Clearance',
            'moef_seiaa' => 'MOEF SEIAA N.A ECC',
            'application_date' => 'Application Date',
            'sector_of_the_Industry' => 'Sector Of The  Industry',
            'air_water_hazardous' => 'Air Water Hazardous',
            'view_pdfs_files' => 'View PDFs Files',
            'cte_on_east' => 'On East',
            'cte_on_west' => 'On West',
            'cte_on_north' => 'On North',
            'cte_on_south' => 'On South',
            'noc_cce_fees' => 'NOC-CCE Fees',
            'purpose_of_this_application' => 'Explain the purpose of this Application',
            'any_relevant_information_to_be_mentioned' => 'Any relevant information to be mentioned in the A/W/H/NOC Form',
            'water_etps_ultimate_final_body' => 'Ultimate Final Body',
            'water_etps_discharge_point' => 'Discharge Point',
            'water_etps_disposal_mode' => 'Disposal Mode',
            'water_etps_for_domestic' => 'For Domestic',
            'water_etps_disposal_details' => 'Disposal Details',
            'water_etps_fresh_wc_klpd' => 'Fresh WC Klpd [IND/DOM]',
            'water_etps_wwg_klpd' => 'WWG Klpd [IND/DOM]',
            'water_etps_tube_wells' => 'Tube Wells',
            'water_etps_bore_wells' => 'Bore Wells',
            'water_etps_capacity_hp' => 'Capacity/HP',
            'water_etps_cetp_member' => 'CETP Member',
            'water_etps_water_source' => 'Water Source',
            'water_etps_etp_stp_chamber' => 'ETP/STP Chamber',
            'water_etps_capacity' => 'Capacity',
            'water_etps_units' => 'Units',
            'water_etps_date_of_commissioning' => 'Date Of Commissioning',
            'water_etps_remarks' => 'Remarks',
            'wc_watCd' => 'WatCd',
            'wc_watSrc' => 'WatSrc',
            'wc_kls_day' => 'WC Kls/Day',
            'wc_wwg' => 'WWG Kls/Day',
            'wc_remarks' => 'Remarks',
            'air_stack_emission_type' => 'Emission Type',
            'air_stack_attached_to' => 'Attached To',
            'air_stack_hgt_mtrs' => 'Hgt-Mtrs',
            'air_stack_remarks_capacity' => 'Remarks/Capacity',
            'air_stack_smf' => 'SMF',
            'air_stack_fuel_used' => 'Fuel Used(e.g ldo,coal,wood) ',
            'air_stack_apc' => 'APC',
            'air_stack_diameter' => 'Diameter(cm)',
            'air_stack_cons_hour_unit' => 'Cons/Hour &Unit',
            'air_stack_air_pollution_control_measures' => 'Air Pollution Control Measures',
            'hazardous_waste_category' => 'Category',
            'hazardous_waste_name' => 'Name',
            'hazardous_waste_qty_yr' => 'Qty/Year',
            'hazardous_waste_unit' => 'Unit',
            'hazardous_waste_apc' => 'APC',
            'hazardous_waste_management_of_hazardous_waste_disposal' => 'Management Of Hazardous Waste Disposal',
            'raw_material_product_name' => 'Product Name',
            'raw_material_unit' => 'Unit',
            'raw_material_cte_quantity' => 'CTE Qty',
            'raw_material_applied_quantity' => 'Applied Quantity',
            'raw_material_remarks' => 'Remarks',
            'raw_material_apc' => 'APC',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

	public function beforeSave($insert = true) {
		
		if(isset($this->production_date)) {
			$this->production_date = date('Y-m-d', strtotime($this->production_date)); 
		}
		if(isset($this->plant_commission)) {
			$this->plant_commission = date('Y-m-d', strtotime($this->plant_commission)); 
		} 
		if(isset($this->application_date)) {
			$this->application_date = date('Y-m-d', strtotime($this->application_date)); 
		}
		if(isset($this->water_etps_date_of_commissioning)) {
			$this->water_etps_date_of_commissioning = date('Y-m-d', strtotime($this->water_etps_date_of_commissioning)); 
		} 
		return parent::beforeSave($insert);
	}
}
