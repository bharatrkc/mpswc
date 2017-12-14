<?php
namespace app\models;

use Yii;
use yii\base\Model;

class ServicewizardForm extends Model {

	 public function validate11() { 
		 
		 if(count($_POST)) { 

				 $service_id = array();
				 foreach($_POST['wizardForm'] as $val) {
					 if(is_array($val)) { 
						foreach($val as $key=>$services) {
							if($services == '') {
									
							   $this->addError($model, $key, 'The country must be either "USA" or "Web".');
								return false;
							}
						}
					 } 
				 }
		}

	} 


 
} 