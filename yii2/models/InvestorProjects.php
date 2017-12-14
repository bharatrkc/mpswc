<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "{{%investor_projects}}".
 *
 * @property integer $id
 * @property integer $investor_id
 * @property string $investment_limit
 * @property string $company
 * @property string $investor_name
 * @property string $designation
 * @property string $address
 * @property string $country
 * @property string $email
 * @property string $pincode
 * @property integer $mobile
 * @property string $project_details
 * @property string $sector
 * @property integer $department_approval
 * @property string $created
 * @property integer $created_by
 * @property string $updated
 * @property integer $updated_by
 * @property integer $line_of_activity
 * @property string $answer_json
 * @property integer $town
 * @property integer $city
 * @property integer $location
 */
class InvestorProjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $state;

     //public $answer_json;
	
	// public $line_of_activity;
  	
	public $pollution_category;

    public static function tableName()
    {
        return '{{%investor_projects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project', 'type','investment_limit', 'company', 'investor_name', 'project_finalized', 'designation','line_of_activity', 'address', 'country', 'email', 'pincode', 'mobile', 'project_details', 'sector', 'district', 'total_investment', 'employment', 'commencement_date','line_of_activity'], 'required', 'message' => 'Required field'],

            [['investor_id', 'department_approval', 'pincode', 'employment', 'mobile'], 'integer', 'message' => 'Invalid value'],

            [['total_investment', 'water', 'land', 'power_load'], 'double', 'message' => 'Invalid value'], 

            [['created', 'updated','answer_json','town','city','location'], 'safe'],

            [['investment_limit', 'company', 'investor_name', 'designation', 'address', 'country', 'email', 'sector'], 'string', 'max' => 255],

			['email', 'email'],
			['commencement_date', 'match', 'pattern' => '/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/'],
			[['commencement_date'], 'date', 'format' => 'php:d-m-Y'],
 
			[['project', 'investment_limit', 'company', 'investor_name', 'designation', 'address', 'country', 'mobile', 'project_details','district'],'filter','filter'=>'\yii\helpers\HtmlPurifier::process'], 
			
			['pincode', 'match', 'pattern' => '/^[1-9][0-9]{5}$/', 'message' => 'Invalid Pincode'],
				
		 	['mobile', 'match', 'pattern' => '/^[0-9]{10}$/'],
			
			
			[['project', 'investment_limit', 'company','investor_name', 'designation', 'address','country', 'mobile', 'project_details', 'district'], 'match', 'pattern' => '/^[-\w\s\,]+$/', 'message' => 'Entered special characters not allowed'], 
		//	[['project','investment_limit','company','investor_name','designation','address','country','pincode','mobile','project_details','sector','district','total_investment','employment'],'filter','filter'=>'\yii\helpers\Html::encode']
		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
             'type'=>'Type',
            'investor_id' => 'Investor ID',
            'project' => 'Project',
            'investment_limit' => 'Investment Limit',
            'company' => 'Company',
            'investor_name' => 'Investor Name',
            'designation' => 'Designation',
            'address' => 'Address',
            'country' => 'Country',
            'email' => 'Email',
            'pincode' => 'Pincode',
            'mobile' => 'Mobile',
            'project_details' => 'Project Details',
            'sector' => 'Sector',
            'department_approval' => 'Department Approval',
            'created' => 'Created', 
            'updated' => 'Updated',
			'line_of_activity' => 'Line Of Activity',
            'answer_json' => 'Answer Json',
            'town' => 'Town',
            'city' => 'City',
            'location' => 'Location',
        ];
    }

		
	public function beforeSave($insert = true) {
		
		if(isset($this->commencement_date)) {
			$this->commencement_date = date('Y-m-d', strtotime($this->commencement_date)); 
		}

		$user_id = Yii::$app->user->identity->id; 
		$this->created_by = $user_id; 
		$this->updated_by = $user_id;   

		return parent::beforeSave($insert);
	}

}
