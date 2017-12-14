<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_building_construction_workers_act_1996}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $establishment_complete_address
 * @property integer $establishment_telephone_no
 * @property integer $establishment_fax_no
 * @property integer $establishment_aadhar_no
 * @property string $establishment_email_id
 * @property string $establishment_district
 * @property string $work_details_estimated_date_of_commencement_of_work
 * @property string $work_details_estimated_date_of_completion_of_work
 * @property string $work_details_maximum_number_of_labours
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationBuildingConstructionWorkersAct1996 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_building_construction_workers_act_1996}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'establishment_complete_address', 'establishment_aadhar_no', 'establishment_email_id', 'establishment_district'], 'required'],
            [['project_id', 'establishment_telephone_no', 'establishment_fax_no', 'establishment_aadhar_no'], 'integer'],
			
			['establishment_email_id', 'email'],

            [['work_details_estimated_date_of_commencement_of_work', 'work_details_estimated_date_of_completion_of_work', 'created', 'updated'], 'safe'],
            [['establishment_complete_address', 'establishment_email_id', 'establishment_district', 'work_details_maximum_number_of_labours'], 'string', 'max' => 255],
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
            'establishment_complete_address' => 'Establishment Complete Address',
            'establishment_telephone_no' => 'Establishment Telephone No',
            'establishment_fax_no' => 'Establishment Fax No',
            'establishment_aadhar_no' => 'Establishment Aadhar No',
            'establishment_email_id' => 'Establishment Email ID',
            'establishment_district' => 'Establishment District',
            'work_details_estimated_date_of_commencement_of_work' => 'Work Details Estimated Date Of Commencement Of Work',
            'work_details_estimated_date_of_completion_of_work' => 'Work Details Estimated Date Of Completion Of Work',
            'work_details_maximum_number_of_labours' => 'Work Details Maximum Number Of Labours',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
