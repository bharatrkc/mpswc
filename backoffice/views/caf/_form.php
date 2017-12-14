<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caf */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'investor_id')->textInput() ?>

    <?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'constitution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_date')->textInput() ?>

    <?= $form->field($model, 'company_website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pan_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_fax_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_s_d_w_o')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_s_d_w_o')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_dob')->textInput() ?>

    <?= $form->field($model, 'applicant_designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_aadhar_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applicant_fax_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_line2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correspondence_address_fax_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_line2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_office_address_fax_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_of_activity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pollution_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_new_or_expansion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_production_date')->textInput() ?>

    <?= $form->field($model, 'women_entrepreneur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'differently_abled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minority')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direct_male')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direct_female')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indirect_male')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indirect_female')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_of_land')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_of_building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_of_plant_and_machinery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_project_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industry_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_of_land')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_of_industrial_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'land_use_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plot_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_address_line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_tehsil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_total_extend_of_site_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_area_for_development')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_total_built_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_height_of_building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed_site_building_plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_manufacture_product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_manufacture_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_manufacture_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_materials_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_materials_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_materials_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_capacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_capacity_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
