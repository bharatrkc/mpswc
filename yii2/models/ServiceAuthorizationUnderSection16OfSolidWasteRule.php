<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_authorization_under_section_16_of_solid_waste_rule}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $authorisation_required_for_setting_up_operation
 * @property double $total_quantity_of_waste
 * @property double $quantity_of_waste_to_be_recycled
 * @property double $quantity_of_waste_to_be_treated
 * @property double $quantity_of_waste_to_be_disposed_into_landfill
 * @property double $utilisation_programme_for_waste_processed
 * @property integer $methodology_for_disposal
 * @property string $measures_taken_prevention_control_environmental
 * @property string $measures_taken_for_safety_of_workers
 * @property string $details_on_solid_waste_processing
 * @property integer $number_of_sites_identified
 * @property integer $quantity_waste_to_be_disposed_per_day
 * @property string $details_of_methodology_followed
 * @property integer $details_of_existing_site_under_operation
 * @property integer $methodology_and_operational_details
 * @property string $measures_to_check_environmental_pollution
 * @property string $other_information
 * @property string $created
 * @property string $updated
 */
class ServiceAuthorizationUnderSection16OfSolidWasteRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_authorization_under_section_16_of_solid_waste_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'authorisation_required_for_setting_up_operation', 'total_quantity_of_waste', 'quantity_of_waste_to_be_recycled', 'quantity_of_waste_to_be_treated', 'quantity_of_waste_to_be_disposed_into_landfill', 'utilisation_programme_for_waste_processed', 'methodology_for_disposal', 'measures_taken_prevention_control_environmental', 'measures_taken_for_safety_of_workers', 'details_on_solid_waste_processing', 'number_of_sites_identified', 'quantity_waste_to_be_disposed_per_day', 'details_of_methodology_followed', 'details_of_existing_site_under_operation', 'methodology_and_operational_details', 'measures_to_check_environmental_pollution', 'other_information', 'created', 'updated'], 'required'],
            [['project_id', 'methodology_for_disposal', 'number_of_sites_identified', 'quantity_waste_to_be_disposed_per_day', 'details_of_existing_site_under_operation', 'methodology_and_operational_details'], 'integer'],
            [['total_quantity_of_waste', 'quantity_of_waste_to_be_recycled', 'quantity_of_waste_to_be_treated', 'quantity_of_waste_to_be_disposed_into_landfill', 'utilisation_programme_for_waste_processed'], 'number'],
            [['measures_to_check_environmental_pollution', 'other_information'], 'string'],
            [['created', 'updated'], 'safe'],
            [['authorisation_required_for_setting_up_operation', 'measures_taken_prevention_control_environmental', 'measures_taken_for_safety_of_workers', 'details_on_solid_waste_processing', 'details_of_methodology_followed'], 'string', 'max' => 255],
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
            'authorisation_required_for_setting_up_operation' => 'Authorisation Required For Setting Up Operation',
            'total_quantity_of_waste' => 'Total Quantity Of Waste',
            'quantity_of_waste_to_be_recycled' => 'Quantity Of Waste To Be Recycled',
            'quantity_of_waste_to_be_treated' => 'Quantity Of Waste To Be Treated',
            'quantity_of_waste_to_be_disposed_into_landfill' => 'Quantity Of Waste To Be Disposed Into Landfill',
            'utilisation_programme_for_waste_processed' => 'Utilisation Programme For Waste Processed',
            'methodology_for_disposal' => 'Methodology For Disposal',
            'measures_taken_prevention_control_environmental' => 'Measures Taken Prevention Control Environmental',
            'measures_taken_for_safety_of_workers' => 'Measures Taken For Safety Of Workers',
            'details_on_solid_waste_processing' => 'Details On Solid Waste Processing',
            'number_of_sites_identified' => 'Number Of Sites Identified',
            'quantity_waste_to_be_disposed_per_day' => 'Quantity Waste To Be Disposed Per Day',
            'details_of_methodology_followed' => 'Details Of Methodology Followed',
            'details_of_existing_site_under_operation' => 'Details Of Existing Site Under Operation',
            'methodology_and_operational_details' => 'Methodology And Operational Details',
            'measures_to_check_environmental_pollution' => 'Measures To Check Environmental Pollution',
            'other_information' => 'Other Information',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
