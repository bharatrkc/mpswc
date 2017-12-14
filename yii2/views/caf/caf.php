<?php
use yii\web\View;  
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar; 
use app\assets\AppAsset;   
use yii\helpers\ArrayHelper;   
//use yii\jui\DatePicker;
use kartik\date\DatePicker;
use app\models\State;
use app\models\Country;
use app\models\District;
use app\models\City;
use app\models\Town;
use app\models\Tehsil;


use app\models\MmUnit;
use app\models\MmLineOfActivitySector;
use app\models\MmLineOfActivity;


$this->title = 'Consolidated Application Form'; 
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?php echo $this->title; ?></h2>		
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> 
	</div>
	<div class="col-lg-2"></div>
</div>

<!---------------------------Form step breadcrumb----------------------------->

<?=$this->render('caf_breadcrumb.php', [
        'investorProjectDetail' => $investorProjectDetail,
        'industry_status' => $industry_status,
        'services' => $services,
		'industry_status' => $industry_status,
		'model'=>$model,
	
    ])?>

<!---------------------------end of Form step breadcrumb----------------------------->

<div class="wrapper wrapper-content animated fadeInRight"> 

<div class="form-investor"> 
<?php
if(count(Yii::$app->session->getAllFlashes())) {
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
}
$form = ActiveForm::begin(['options' => 
						['class' => 'form-horizontal'],
                       'enableAjaxValidation' => false, ]);   
?>
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>Organization Details</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body"> 
		
		<div class="row"> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?>
			</div> 
			<div class="col-lg-6">
			<?php
			
			$company_type = array();

			foreach($comp_type as $key=>$val)
			{
				$company_type[$comp_type[$key]['company_type_id']] = $comp_type[$key]['name'];
			}

			?>
					<?= $form->field($model, 'constitution')->dropdownList($company_type, 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Constitution'); ?>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
					<?= $form->field($model, 'registration_no')->textInput(['maxlength' => true]) ?>
			</div> 
			<div class="col-lg-6">  
					<?= $form->field($model, 'registration_date')->textInput(['readonly' => true])->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'endDate'=>date('d-m-Y'),
                                    'startDate'=>'01-01-1800',
                                    ],
                                    'type' => DatePicker::TYPE_INPUT,
                                    
                                ]);  ?> 
			</div>
		</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'company_website')->textInput(['maxlength' => true])->label('URL of Company Website'); ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'pan_number')->textInput(['maxlength' => true]) ?>
					</div>
			</div>
	</div>
	</div>
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="fa fa-list"></i>Contact Details</div>
			<div class="tools"> </div>
		</div>

		<div class="portlet-body"> 
			<h3>Proprietor/Partners/Promoters/Directors of the Unit</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_name')->textInput(['maxlength' => true])->label('Name'); ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_designation')->textInput(['maxlength' => true])->label('Designation'); ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_mobile')->textInput(['maxlength' => true])->label('Mobile No.') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_email')->textInput(['maxlength' => true])->label('Email ID') ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_phone_no')->textInput(['maxlength' => true])->label('Phone No.') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'contact_fax_no')->textInput(['maxlength' => true])->label('Fax No.') ?>
					</div>
			</div>
			
		
			<h3>Manager Details</h3>

			<div class="row"> 
					<div class="col-lg-6">
						<div class="form-group ">
						<label class="control-label">Same as</label> 
						<select class="copy-details form-control" id="copy-manager-details">
							<option value="">Select</option>
							<option value="director">Proprietor/Partners/Promoters/Directors of the Unit</option>
						</select> 
					</div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'manager_name')->textInput(['maxlength' => true])->label('Name') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'manager_s_d_w_o')->textInput(['maxlength' => true])->label('S/o.D/o.W/o') ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'manager_address')->textArea(['maxlength' => true])->label('Address (Add. , State, District, Pincode)') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'manager_mobile')->textInput(['maxlength' => true])->label('Mobile') ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'manager_email')->textInput(['maxlength' => true])->label('Email ID') ?>
					</div> 
			</div>

			<h3></h3>
			
			
			<h3>Applicant Details</h3>

			<div class="row"> 
					<div class="col-lg-6">
						<div class="form-group ">
						<label class="control-label">Same as</label> 
						<select class="copy-details form-control" id="copy-applicant-details">
							<option value="">Select</option>
							<option value="director">Proprietor/Partners/Promoters/Directors of the Unit</option>
							<option value="manager">Manager Details</option>
						</select> 
					</div> 
					</div>
			</div>

			<div class="row"> 
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true])->label('Name') ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_s_d_w_o')->textInput(['maxlength' => true])->label('S/o.D/o.W/o'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_dob')->textInput(['readonly' => true])->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'endDate'=>date('d-m-Y'),
									'startDate'=>'01-01-1800',
                                    ],
                                    'type' => DatePicker::TYPE_INPUT,
                                    
                                ])->label('Date of Birth'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_designation')->textInput(['maxlength' => true])->label('Designation') ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_aadhar_no', ['enableAjaxValidation' => true, 'validateOnChange' => true])->textInput()->label('AADHAR No.') ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_mobile')->textInput(['maxlength' => true])->label('Mobile No.') ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_email')->textInput(['maxlength' => true])->label('Email ID') ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_phone_no')->textInput(['maxlength' => true])->label('Phone No.') ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'applicant_fax_no')->textInput(['maxlength' => true])->label('Fax No.') ?>
					</div>
			</div>
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Address</div>
				<div class="tools"> </div>
			</div>

			<div class="portlet-body"> 
				<h3>Correspondence Address</h3>
				
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_line1')->textInput(['maxlength' => true])->label('Address Line 1') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_line2')->textInput(['maxlength' => true])->label('Address Line 2') ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_district')->textInput(['maxlength' => true])->label('District') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_state')->textInput(['maxlength' => true])->label('State') ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?php
					$items = ArrayHelper::map(Country::find('country_id', 'name')->all(), 'country_id', 'name');
                    echo $form->field($model, 'correspondence_address_country')->dropDownList($items, 
						['prompt' => 'Select Country',])->label('Country');
					?> 
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_pincode')->textInput(['maxlength' => true]) ->label('Pincode') ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_mobile')->textInput(['maxlength' => true])->label('Mobile No.') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_email')->textInput(['maxlength' => true])->label('Email ID') ?>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_phone_no')->textInput(['maxlength' => true])->label('Phone No.') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'correspondence_address_fax_no')->textInput(['maxlength' => true])->label('Fax No.') ?>
					</div>
			</div>

			<div class="col-lg-3" style="float:left;">
				<h3>Registered Office Address</h3>
			</div>
			<div class="col-lg-2" style="float:left;">
				<span class="checkbox i-check">
					<input type="checkbox" name="sameasabov" id="sameasabov" value="">
					 - Same as above
				</span>
			</div>
				<div class="clearfix"></div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_line1')->textInput(['maxlength' => true])->label('Address Line 1') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_line2')->textInput(['maxlength' => true])->label('Address Line 2') ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_district')->textInput(['maxlength' => true])->label('District') ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_state')->textInput(['maxlength' => true])->label('State') ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6"> 
					<?php
					$items = ArrayHelper::map(Country::find('country_id', 'name')->all(), 'country_id', 'name');
                    echo $form->field($model, 'registered_office_address_country')->dropDownList($items, 
						['prompt' => 'Select Country',])->label('Country');
					?> 

					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_pincode')->textInput(['maxlength' => true])->label('Pincode') ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'registered_office_address_fax_no')->textInput(['maxlength' => true]) ?>
					</div> 
			</div> 
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Project Information</div>
				<div class="tools"> </div>
			</div>

			<div class="portlet-body">
			<div class="row">
				<div class="col-lg-6">
					<?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-lg-6">
					<?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
				</div> 
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php 
					
					$itemsline = ArrayHelper::map(MmLineOfActivity::find()->all(), 'id', 'line_of_activity');
					
					$items = ArrayHelper::map(MmLineOfActivitySector::find()->all(), 'sector', 'sector');
					
					echo $form->field($model, 'sector')->dropDownList($items, ['prompt' => 'Select', 'class' => 'form-control']);
					?>
				</div>
				<div class="col-lg-6">
 					<?php
					echo $form->field($model, 'line_of_activity')->dropDownList(['0' => 'Other'] + $itemsline, ['prompt' => 'Select', 'class' => 'form-control','readOnly'=>true]);
					?>
				</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'pollution_category')->textInput(['maxlength' => true,'readOnly'=>true]) ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'project_new_or_expansion')->
					hiddenInput(['value'=> 'Yes'])->label(false);
	
/*	
							dropdownList([
							'Yes'=>'Yes',
							'No'=>'No',
							],
							['options' =>['Yes' => ['Selected'=>'selected']],
							 'prompt' => 'Select', 'class' => 'form-control','Readonly'=>'readonly']
							)->label('Project is New or an Expansion'); 
*/
						?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6"> 
					<?= $form->field($model, 'proposed_production_date')->textInput(['readonly' => true])->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate'=>date('d-m-Y')
                                    ],
                                    'type' => DatePicker::TYPE_INPUT,
                                    
                                ])->label('Proposed Production Date'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'women_entrepreneur')->dropdownList([
							'Yes' => 'Yes', 
							'No' => 'No', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Women Entrepreneur'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'differently_abled')->dropdownList([
							'Yes' => 'Yes', 
							'No' => 'No', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Differently Abled'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'minority')->dropdownList([
							'Yes' => 'Yes', 
							'No' => 'No', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Minority'); ?>
					</div> 
			</div>
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Employment Details </div> <!-- : Total should be equal to: <?php echo $employment; ?> -->
				<div class="tools"> </div>
			</div>
			<div class="portlet-body"> 
			<h3>Direct</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'direct_male')->textInput(['maxlength' => true])->label('Male'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'direct_female')->textInput(['maxlength' => true])->label('Female'); ?>
					</div> 
			</div>
			<h3>Indirect</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'indirect_male')->textInput(['maxlength' => true])->label('Male'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'indirect_female')->textInput(['maxlength' => true])->label('Female'); ?>
					</div> 
			</div>
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Investment Details</div>
				<div class="tools"> </div>
			</div>
			<div class="portlet-body"> 
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'value_of_land')->textInput(['maxlength' => true])->label('Value of Land (in Lakhs)'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'value_of_building')->textInput(['maxlength' => true])->label('Value of Building(in Lakhs)'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'value_of_plant_and_machinery')->textInput(['maxlength' => true])->label('Value of Plant and Machinery / Service Equipment (In Lakhs)'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'total_project_value')->textInput(['maxlength' => true, 'readOnly'=> true])->label('Total Project Value'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'industry_type')->dropdownList([
							'Micro' => 'Micro', 
							'Small' => 'Small',
							'Medium' => 'Medium',
							'Large' => 'Large',
							'Mega' => 'Mega', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Industry Type'); ?>
					</div>
			</div>
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Land Details</div>
				<div class="tools"> </div>
			</div>
			<div class="portlet-body">

			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'type_of_land')->dropdownList([
							'AKVN' => 'AKVN', 
							'DTIC' => 'DTIC', 
							'Private' => 'Private',
							'Government' => 'Government', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Type of Land'); ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'name_of_industrial_area')->textInput(['maxlength' => true]) ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'land_use_type')->dropdownList([
							'Commercial' => 'Commercial', 
							'Industrial' => 'Industrial', 
							'Residential' => 'Residential',
							'Agriculture' => 'Agriculture', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Land Use Type'); ?>
					</div> 
			</div>
			
			<h3>Proposed Site Location</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'plot_number')->textInput(['maxlength' => true])->label('Plot Number'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_address_line1')->textInput(['maxlength' => true])->label('Address Line 1'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6"> 
					<?php 
						$items = ArrayHelper::map(District::find()->where(['state_id'=>1])->all(), 'district_id', 'name');
						echo $form->field($model, 'proposed_site_district')->dropDownList($items, 
						['prompt' => 'Select District',]);
					?>
					</div>
					<div class="col-lg-6"> 
						<?php
						$items = ArrayHelper::map(Tehsil::find()->where(['district_id' => $model->proposed_site_district])->all(), 'id', 'name');
						
						echo $form->field($model, 'proposed_site_tehsil')->dropDownList($items, ['prompt' => 'Select Tehsil']); 
						?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_area')->textInput(['maxlength' => true])->label('Village/Area'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_pincode')->textInput(['maxlength' => true])->label('Pincode'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_telephone')->textInput(['maxlength' => true])->label('Telephone'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_total_extend_of_site_area')->textInput(['maxlength' => true])->label('Total Extent of Site Area(in Sq. mts)'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_area_for_development')->textInput(['maxlength' => true])->label('Proposed Area for Development(in Sq. mts)'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_total_built_area')->textInput(['maxlength' => true])->label('Total Built up Area(in Sq. mts)'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_height_of_building')->textInput(['maxlength' => true])->label('Height of the Building(In mts)'); ?>

					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'proposed_site_building_plan')->dropdownList([
							'New' => 'New', 
							'Amendment' => 'Amendment', 
							], 
							['prompt' => 'Select', 'class' => 'form-control'] 
							)->label('Building Plan Approval'); ?>
					</div> 
			</div>
		</div>
		</div>

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Manufacturing Activity Details</div>
				<div class="tools"> </div>
			</div>
			<div class="portlet-body">
			<h3>Line of Manufacture</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'line_manufacture_product_name')->textInput(['maxlength' => true])->label('Product Name'); ?>
					</div>
					<div class="col-lg-6">
					<?= $form->field($model, 'line_manufacture_quantity')->textInput(['maxlength' => true])->label('Quantity (Per Annum)'); ?>
					</div> 
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?php 
						$items = ArrayHelper::map(MmUnit::find()->all(), 'description', 'description');
						echo $form->field($model, 'line_manufacture_unit')->dropDownList($items, 
						['prompt' => 'Select',]);
					?>
					</div>
			</div>
			
			<h3>Raw Materials Used in Process</h3>
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'raw_materials_item')->textInput(['maxlength' => true])->label('Item'); ?>
					</div> 
					<div class="col-lg-6">
					<?= $form->field($model, 'raw_materials_quantity')->textInput(['maxlength' => true])->label('Quantity (Per Annum)'); ?>
					</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
					<?php 
						$items = ArrayHelper::map(MmUnit::find()->all(), 'description', 'description');
						echo $form->field($model, 'raw_materials_unit')->dropDownList($items, 
						['prompt' => 'Select',]);
					?>
					</div> 
			</div>
		</div>
		</div> 
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-list"></i>Production Capacity</div>
				<div class="tools"> </div>
			</div>
			<div class="portlet-body"> 
			<div class="row">
					<div class="col-lg-6">
					<?= $form->field($model, 'production_capacity')->textInput(['maxlength' => true])->label('Production Capacity'); ?>
					</div>
					<div class="col-lg-6">
					<?php 
						$items = ArrayHelper::map(MmUnit::find()->all(), 'description', 'description');
						echo $form->field($model, 'production_capacity_unit')->dropDownList($items, 
						['prompt' => 'Select',]);
					?>
					</div> 
			</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 text-center"> 
					<?= Html::submitButton('Next', ['class' => 'btn btn-primary caf-submit']) ?> 
			</div>
		</div>

		<input type="hidden" id="project-employment" value="<?php echo $employment; ?>"/>
		<input type="hidden" id="project-land" value="<?php if($land>0){ echo $land; } else{ echo 0; } ?>"/>
		
		<?php ActiveForm::end(); ?>

	
</div>
</div>


<?php
 	 
	$this->registerJsFile(
		'backoffice/inspinia/js/bootstrap.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	); 
	
	$this->registerJsFile(
		'backoffice/inspinia/js/plugins/metisMenu/jquery.metisMenu.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);	
	$this->registerJsFile(
		'backoffice/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);	
	$this->registerJsFile(
		'backoffice/inspinia/js/inspinia.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
	$this->registerJsFile(
		'backoffice/inspinia/js/plugins/pace/pace.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
	  
    $this->registerCssFile(
    '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css',
    [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()], 
	], 'css-style-services');



$this->registerJs(
'
jQuery(document).ready(function() {
 
     $("#caf-line_of_activity").change(function(){ 
         $.post("'.Url::toRoute("/caf/lineofactivitiespol").'", {
				id: $(this).val() } )
				.done(function( data ) {
					if(data!="")
					{
							$( "#'.Html::getInputId($model, 'pollution_category').'" ).val( data );
					}
					else
					{
							$( "#'.Html::getInputId($model, 'pollution_category').'" ).val("White");
					}


					}
				);
    });

 
    jQuery("#copy-manager-details").change(function(){ 
       
		var contact_name =  jQuery("#caf-contact_name").val();
		var contact_designation =  jQuery("#caf-contact_designation").val();
		var contact_mobile =  jQuery("#caf-contact_mobile").val();
		var contact_email =  jQuery("#caf-contact_email").val();
		var contact_phone_no =  jQuery("#caf-contact_phone_no").val();
		var contact_fax_no =  jQuery("#caf-contact_fax_no").val();
		
		val = jQuery("#copy-manager-details").val(); 
		if(val == "director") { 
			jQuery("#caf-manager_name").val(contact_name);
			jQuery("#caf-manager_mobile").val(contact_mobile);
			jQuery("#caf-manager_email").val(contact_email); 
		} 
		if(val == 0) { 
			jQuery("#caf-manager_name").val("");
			jQuery("#caf-manager_mobile").val("");
			jQuery("#caf-manager_email").val("");
		}
    }); 

    jQuery("#copy-applicant-details").change(function(){ 
       
		val = jQuery("#copy-applicant-details").val();

		
		var contact_name =  jQuery("#caf-contact_name").val();
		var contact_designation =  jQuery("#caf-contact_designation").val();
		var contact_mobile =  jQuery("#caf-contact_mobile").val();
		var contact_email =  jQuery("#caf-contact_email").val();
		var contact_phone_no =  jQuery("#caf-contact_phone_no").val();
		var contact_fax_no =  jQuery("#caf-contact_fax_no").val();
		 
		if(val == "director") { 
			jQuery("#caf-applicant_name").val(contact_name);
			jQuery("#caf-applicant_mobile").val(contact_mobile);
			jQuery("#caf-applicant_email").val(contact_email); 
			jQuery("#caf-applicant_designation").val(contact_designation);
			jQuery("#caf-applicant_fax_no").val(contact_fax_no);
		} 
		if(val == "manager") {
			
			var manager_name =  jQuery("#caf-manager_name").val();
			var manager_sdwo =  jQuery("#caf-manager_s_d_w_o").val();
			var manager_address =  jQuery("#caf-manager_address").val();
			var manager_mobile =  jQuery("#caf-manager_mobile").val();
			var manager_email =  jQuery("#caf-manager_email").val();
			
			jQuery("#caf-applicant_name").val(manager_name);
	        jQuery("#caf-applicant_s_d_w_o").val(manager_sdwo);
			jQuery("#caf-applicant_mobile").val(manager_mobile);
			jQuery("#caf-applicant_email").val(manager_email); 
			jQuery("#caf-applicant_designation").val("");
			jQuery("#caf-applicant_phone_no").val("");
			jQuery("#caf-applicant_fax_no").val(""); 
		} 

		if(val == "") {

			jQuery("#caf-applicant_name").val("");
	        jQuery("#caf-applicant_s_d_w_o").val("");
			jQuery("#caf-applicant_mobile").val("");
			jQuery("#caf-applicant_email").val(""); 
			jQuery("#caf-applicant_designation").val("");
			jQuery("#caf-applicant_phone_no").val("");
			jQuery("#caf-applicant_fax_no").val(""); 
		}

    });  
	
	
		if((jQuery("#caf-proposed_site_area_for_development").val())=="")
		{
			jQuery("#caf-proposed_site_area_for_development").val("0");
		}
		else
		{
			jQuery("#caf-proposed_site_area_for_development").attr("disabled", true);
		}

		var xval = $("#caf-constitution > option:contains(\'Other\')").val();

		$("#caf-constitution > option:contains(\'Other\')").remove();

		$("#caf-constitution").append(\'<option value="\'+xval+\'">Others</option>\');

		jQuery("#caf-proposed_site_total_extend_of_site_area").change(function(event){
			caf_land = jQuery("#caf-proposed_site_area_for_development").val();
			var project_land = jQuery("#project-land").val();

			if(caf_land != project_land) {
				//alert("Proposed Area for Development should be equal to: "+project_land);
				jQuery(".field-proposed_site_total_extend_of_site_area").children(".inerror").remove();
				jQuery(".field-proposed_site_total_extend_of_site_area").append("<div class=\"inerror\" style=\"color:#a94442;text-align:right;\">Proposed Area for Development should be equal to: "+project_land+"</div>");
				jQuery("#caf-proposed_site_total_extend_of_site_area").focus();
				event.preventDefault();
				return false;
			}
			else
			{
				jQuery(".field-proposed_site_total_extend_of_site_area").children(".inerror").remove();
			}

		});


		jQuery("#caf-proposed_site_total_built_area").change(function(event){ 

			var project_land = jQuery("#project-land").val()*1;
			total_extend_of_site = jQuery("#caf-proposed_site_total_extend_of_site_area").val()*1;
			total_built_area = jQuery("#caf-proposed_site_total_built_area").val()*1;
			total = total_extend_of_site+total_built_area;

			if(total > 0) {
				var ttonto = jQuery("#caf-proposed_site_area_for_development").val();
				if(total != ttonto) {
				//alert("Total Extent of Site Area and Total Built up Area should be equal to:"+ttonto);
				jQuery(".field-caf-proposed_site_total_built_area").children(".inerror").remove();
				jQuery(".field-caf-proposed_site_total_built_area").append("<div class=\"inerror\" style=\"color:#a94442;text-align:right;\">Sum of Total Extent of Site Area and Total Built up Area should be equal to:"+ttonto+"</div>");
				jQuery("#caf-proposed_site_total_built_area").focus();
				event.preventDefault();
				return false;
			}
			else
			{
				jQuery(".field-caf-proposed_site_total_built_area").children(".inerror").remove();
			}
		}



		});



		jQuery(".caf-submit").click(function(){
		
		var project_land = jQuery("#project-land").val()*1;
			total_extend_of_site = jQuery("#caf-proposed_site_total_extend_of_site_area").val()*1;
			total_built_area = jQuery("#caf-proposed_site_total_built_area").val()*1;
			total = total_extend_of_site+total_built_area;

			if(total > 0) {
			var ttonto = jQuery("#caf-proposed_site_area_for_development").val();
				if(total != ttonto) {
				//alert("Total Extent of Site Area and Total Built up Area should be equal to:"+ttonto);
				jQuery(".field-caf-proposed_site_total_built_area").children(".inerror").remove();
				jQuery(".field-caf-proposed_site_total_built_area").append("<div class=\"inerror\" style=\"color:#a94442;text-align:right;\">Sum of Total Extent of Site Area and Total Built up Area should be equal to:"+ttonto+"</div>");
				jQuery("#caf-proposed_site_total_built_area").focus();
				event.preventDefault();
				return false;
			}
			else
			{
				jQuery(".field-caf-proposed_site_total_built_area").children(".inerror").remove();
			}
		}
		
		var project_employment = jQuery("#project-employment").val()*1;
		var caf_direct_male = jQuery("#caf-direct_male").val()*1;
		var caf_indirect_male = jQuery("#caf-indirect_male").val()*1;
		var caf_direct_female = jQuery("#caf-direct_female").val()*1;
		var caf_indirect_female = jQuery("#caf-indirect_female").val()*1;
		
		totalemloyment = caf_direct_male+caf_indirect_male+caf_direct_female+caf_indirect_female;
		
		if(totalemloyment != project_employment) {

		//	alert("Employment details total should be equal to: "+project_employment);
		//	jQuery("#caf-direct_male").val("");
		//	jQuery("#caf-indirect_male").val("");
		//	jQuery("#caf-direct_female").val("");
		//	jQuery("#caf-indirect_female").val("");
		//	return false;

		}

	});




 	function getNum(val) {
	   if (isNaN(val)) {
		 return 0;
	   }
	   return val;
	}

	jQuery("#caf-value_of_land").focusout(function(){ 
 		var a = parseFloat(jQuery("#caf-value_of_land").val());
		var b = parseFloat(jQuery("#caf-value_of_building").val());
		var c = parseFloat(jQuery("#caf-value_of_plant_and_machinery").val());

		var a = getNum(a);
		var b = getNum(b);
		var c = getNum(c); 

		sum = a+b+c;  
		jQuery("#caf-total_project_value").val(sum); 
	});
	jQuery("#caf-value_of_building").focusout(function(){
		var a = parseFloat(jQuery("#caf-value_of_land").val());
		var b = parseFloat(jQuery("#caf-value_of_building").val());
		var c = parseFloat(jQuery("#caf-value_of_plant_and_machinery").val());

		var a = getNum(a);
		var b = getNum(b);
		var c = getNum(c); 

		sum = a+b+c;  
		jQuery("#caf-total_project_value").val(sum); 
	});
	jQuery("#caf-value_of_plant_and_machinery").focusout(function(){
		var a = parseFloat(jQuery("#caf-value_of_land").val());
		var b = parseFloat(jQuery("#caf-value_of_building").val());
		var c = parseFloat(jQuery("#caf-value_of_plant_and_machinery").val());

		var a = getNum(a);
		var b = getNum(b);
		var c = getNum(c); 

		sum = a+b+c;  
		jQuery("#caf-total_project_value").val(sum); 
	}); 
});

', View::POS_READY, 'autocalculate-fields');


  
$this->registerJs(
'
jQuery(document).ready(function(){ 
	 
    jQuery("#caf-proposed_site_district").change(function(){ 
        jQuery.get("'.Url::toRoute("/project/districttehsils").'", { 
				id: jQuery(this).val() } )
				.done(function( data ) {
						jQuery( "#'.Html::getInputId($model, 'proposed_site_tehsil').'" ).html( data );
					}
				);
    });
	
	var lnOact = "'.$investor_project[0]->line_of_activity.'";

	if(lnOact=="")
	{
	lnOact = "0";
	}

	jQuery("#caf-line_of_activity").val(lnOact);

     jQuery.post("'.Url::toRoute("/caf/lineofactivitiespol").'", {
				id: lnOact } )
				.done(function( data ) {
					if(data!="")
					{
							jQuery( "#'.Html::getInputId($model, 'pollution_category').'" ).val( data );
					}
					else
					{
							jQuery( "#'.Html::getInputId($model, 'pollution_category').'" ).val("White");
					}
				}
				);

	jQuery("#caf-line_of_activity").find("option").not(":selected").remove();

	jQuery("#sameasabov").click(function(){
	if (this.checked) {
    
		var line1 = jQuery("#caf-correspondence_address_line1").val();
		var line2 = jQuery("#caf-correspondence_address_line2").val();
		var dist = jQuery("#caf-correspondence_address_district").val();
		var stats = jQuery("#caf-correspondence_address_state").val();
		var coutry = jQuery("#caf-correspondence_address_country").val();
		var pincod = jQuery("#caf-correspondence_address_pincode").val();
		var faxno =	jQuery("#caf-correspondence_address_fax_no").val();
    

		jQuery("#caf-registered_office_address_line1").val(line1);
		jQuery("#caf-registered_office_address_line2").val(line2);
		jQuery("#caf-registered_office_address_district").val(dist);
		jQuery("#caf-registered_office_address_state").val(stats);
		jQuery("#caf-registered_office_address_country").val(coutry);
		jQuery("#caf-registered_office_address_pincode").val(pincod);
		jQuery("#caf-registered_office_address_fax_no").val(faxno);

	}
	else
	{
		jQuery("#caf-registered_office_address_line1").val("");
		jQuery("#caf-registered_office_address_line2").val("");
		jQuery("#caf-registered_office_address_district").val("");
		jQuery("#caf-registered_office_address_state").val("");
		jQuery("#caf-registered_office_address_country").val("");
		jQuery("#caf-registered_office_address_pincode").val("");
		jQuery("#caf-registered_office_address_fax_no").val("");
	}

	});

});
', View::POS_READY, 'district-ajax');

if($disabled) {
	$this->registerJs(
	'jQuery(document).ready(function(){
		jQuery("input").attr("disabled", true);
		jQuery("select").attr("disabled", true);
		jQuery("textarea").attr("disabled", true);
		jQuery("#investorprojects-other_sector").prop("disabled", true);


		jQuery(".btn-primary").parent().html(""); 
	});


	', View::POS_READY, 'my-button-handler2');
}
?>
