<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_of_shop_and_commercial_establishment}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $lin
 * @property string $name
 * @property string $address
 * @property string $district
 * @property string $category
 * @property string $shop_type
 * @property string $business_type
 * @property string $day_of_weekly_off
 * @property string $owner_type
 * @property string $business_start_date
 * @property string $no_of_years_for_registration
 * @property string $number_of_employees_male_female
 * @property string $name_of_accountant
 * @property string $executive_address
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationOfShopAndCommercialEstablishment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_of_shop_and_commercial_establishment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'name', 'address', 'district', 'category', 'shop_type', 'business_type', 'day_of_weekly_off', 'owner_type', 'business_start_date', 'no_of_years_for_registration', 'number_of_employees_male_female', 'name_of_accountant', 'executive_address'], 'required'],
            [['project_id', 'lin', 'no_of_years_for_registration', 'number_of_employees_male_female'], 'integer'],

            [['created', 'updated'], 'safe'],
            [['name', 'address', 'district', 'category', 'shop_type', 'business_type', 'day_of_weekly_off', 'owner_type', 'name_of_accountant', 'executive_address'], 'string', 'max' => 255],

			
			/*
			[['name', 'address', 'district', 'category', 'shop_type', 'business_type', 'day_of_weekly_off', 'owner_type', 'business_start_date', 'no_of_years_for_registration', 'number_of_employees_male_female', 'name_of_accountant', 'executive_address'], 'match', 'pattern' => '/^[-\w\s\,]+$/', 'message' => 'Special characters not allowed'], */

			[['business_start_date'], 'date', 'format' => 'php:d-m-Y'],
				
			['business_start_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],


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
            'lin' => 'Lin',
            'name' => 'Name',
            'address' => 'Address',
            'district' => 'District',
            'category' => 'Category',
            'shop_type' => 'Shop Type',
            'business_type' => 'Business Type',
            'day_of_weekly_off' => 'Day Of  Weekly Off',
            'owner_type' => 'Owner Type',
            'business_start_date' => 'Business Start Date',
            'no_of_years_for_registration' => 'No Of Years For Registration',
            'number_of_employees_male_female' => 'Number Of Employees Male Female',
            'name_of_accountant' => 'Name Of Accountant',
            'executive_address' => 'Executive Address',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
 

	public function beforeSave($insert = true) {
		
		if(isset($this->business_start_date)) {
			$this->business_start_date = date('Y-m-d', strtotime($this->business_start_date)); 
		} 
 
		return parent::beforeSave($insert);
	}
}
