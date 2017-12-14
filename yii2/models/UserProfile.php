<?php

namespace app\models;

use Yii; 
use yii\validators\Validator;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $pan_number
 * @property string $adhaar_number
 * @property string $address
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $district
 * @property string $pincode
 * @property string $mobile 
 * @property string $access
 * @property string $created
 * @property string $updated
 *
 * @property Users $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'pan_number', 'mobile', 'company_name'], 'required', 'message' => 'Required field'], 
            [['last_password_change', 'created', 'updated'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 255], 
            [['pan_number'], 'string', 'max' => 50],

            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			['pan_number', 'match', 'pattern' => '/^[\w]{3}(p|P|c|C|h|H|f|F|a|A|t|T|b|B|l|L|j|J|g|G)[\w][\d]{4}[\w]{1}$/i'], 

		 	['mobile', 'match', 'pattern' => '/^[0-9]{10}$/'],
			
			[['first_name', 'last_name', 'pan_number', 'mobile', 'company_name'], 'match', 'pattern' => '/^[-\w\s\+]+$/', 'message' => 'Entered special characters are not allowed'],
				
            [['adhaar_number', 'mobile'], 'integer',  'message' => 'Invalid value'],  
			['adhaar_number', 'match', 'pattern' => '/^\s*[+-]?\d{12}\s*$/'],
				 
			['adhaar_number', 'validateAdhaar', 'skipOnError' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'pan_number' => 'Pan Number',
            'adhaar_number' => 'Adhaar Number',
            'pincode' => 'Pincode',
            'mobile' => 'Mobile', 
            'last_password_change' => 'Last Password Change',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
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
