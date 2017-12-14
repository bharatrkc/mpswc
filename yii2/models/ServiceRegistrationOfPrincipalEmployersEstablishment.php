<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_registration_of_principal_employers_establishment}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $establishment_nature_of_work
 * @property string $principal_employer_name
 * @property string $principal_employer_address
 * @property integer $principal_employer_mobile_no
 * @property string $principal_employer_email_id
 * @property string $contractors_name
 * @property string $contractors_address
 * @property string $contractors_nature_of_work
 * @property string $contractors_maximum_number_of_contract_labour
 * @property string $contractors_estimated_date_of_termination
 * @property string $contractors_add_contrator
 * @property string $created
 * @property string $updated
 */
class ServiceRegistrationOfPrincipalEmployersEstablishment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_registration_of_principal_employers_establishment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'establishment_nature_of_work', 'principal_employer_name', 'principal_employer_address'], 'required'],

            [['project_id', 'principal_employer_mobile_no'], 'integer'],

            [['contractors_add_contrator'], 'string'],

            [['created', 'updated'], 'safe'],
            [['establishment_nature_of_work', 'principal_employer_name', 'principal_employer_address', 'principal_employer_email_id', 'contractors_name', 'contractors_nature_of_work', 'contractors_maximum_number_of_contract_labour', 'contractors_estimated_date_of_termination'], 'string', 'max' => 255],
            [['contractors_address'], 'string', 'max' => 500],
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
            'establishment_nature_of_work' => 'Establishment Nature Of Work',
            'principal_employer_name' => 'Principal Employer Name',
            'principal_employer_address' => 'Principal Employer Address',
            'principal_employer_mobile_no' => 'Principal Employer Mobile No',
            'principal_employer_email_id' => 'Principal Employer Email ID',
            'contractors_name' => 'Contractors Name',
            'contractors_address' => 'Contractors Address',
            'contractors_nature_of_work' => 'Contractors Nature Of Work',
            'contractors_maximum_number_of_contract_labour' => 'Contractors Maximum Number Of Contract Labour',
            'contractors_estimated_date_of_termination' => 'Contractors Estimated Date Of Termination',
            'contractors_add_contrator' => 'Contractors Add Contrator',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
