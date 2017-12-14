<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_of_estb_under_interstate_migrant_worker}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $photo_of_applicant
 * @property string $full_name_and_address_of_principal_employer
 * @property integer $mobile_no
 * @property string $email_id
 * @property string $nature_of_work
 * @property string $overseas_worker_name_and_address_of_contractors
 * @property string $overseas_worker_naure_of_work
 * @property integer $overseas_worker_maximum_no_of_workers
 * @property string $overseas_worker_proposed_start_date
 * @property string $overseas_worker_proposed_end_date
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationOfEstbUnderInterstateMigrantWorker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_of_estb_under_interstate_migrant_worker}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			//'photo_of_applicant', 
            [['project_id', 'full_name_and_address_of_principal_employer', 'mobile_no', 'email_id', 'nature_of_work', 'overseas_worker_name_and_address_of_contractors', 'overseas_worker_naure_of_work', 'overseas_worker_maximum_no_of_workers', 'overseas_worker_proposed_start_date', 'overseas_worker_proposed_end_date'], 'required'],
            [['project_id', 'mobile_no', 'overseas_worker_maximum_no_of_workers'], 'integer'],
            [['overseas_worker_proposed_start_date', 'overseas_worker_proposed_end_date', 'created', 'updated'], 'safe'],
            [['photo_of_applicant', 'overseas_worker_name_and_address_of_contractors'], 'string', 'max' => 500],
            [['full_name_and_address_of_principal_employer', 'email_id', 'nature_of_work', 'overseas_worker_naure_of_work'], 'string', 'max' => 255],

			['email_id', 'email'],

			[['overseas_worker_proposed_start_date'], 'date', 'format' => 'php:d-m-Y'],
			[['overseas_worker_proposed_end_date'], 'date', 'format' => 'php:d-m-Y'], 
			
			['overseas_worker_proposed_start_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],
			['overseas_worker_proposed_end_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],
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
            'photo_of_applicant' => 'Photo Of Applicant',
            'full_name_and_address_of_principal_employer' => 'Full Name And Address Of Principal Employer',
            'mobile_no' => 'Mobile No',
            'email_id' => 'Email ID',
            'nature_of_work' => 'Nature Of Work',
            'overseas_worker_name_and_address_of_contractors' => 'Overseas Worker Name And Address Of Contractors',
            'overseas_worker_naure_of_work' => 'Overseas Worker Naure Of Work',
            'overseas_worker_maximum_no_of_workers' => 'Overseas Worker Maximum No Of Workers',
            'overseas_worker_proposed_start_date' => 'Overseas Worker Proposed Start Date',
            'overseas_worker_proposed_end_date' => 'Overseas Worker Proposed End Date',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

	
	public function beforeSave($insert = true) {
		
		if(isset($this->overseas_worker_proposed_start_date)) {
			$this->overseas_worker_proposed_start_date = date('Y-m-d', strtotime($this->overseas_worker_proposed_start_date)); 
		} 
		if(isset($this->overseas_worker_proposed_end_date)) {
			$this->overseas_worker_proposed_end_date = date('Y-m-d', strtotime($this->overseas_worker_proposed_end_date)); 
		} 
 
		return parent::beforeSave($insert);
	}
}
