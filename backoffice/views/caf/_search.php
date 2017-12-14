<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CafSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'investor_id') ?>

    <?= $form->field($model, 'unit_name') ?>

    <?= $form->field($model, 'constitution') ?>

    <?= $form->field($model, 'registration_no') ?>

    <?php // echo $form->field($model, 'registration_date') ?>

    <?php // echo $form->field($model, 'company_website') ?>

    <?php // echo $form->field($model, 'pan_number') ?>

    <?php // echo $form->field($model, 'contact_name') ?>

    <?php // echo $form->field($model, 'contact_designation') ?>

    <?php // echo $form->field($model, 'contact_mobile') ?>

    <?php // echo $form->field($model, 'contact_email') ?>

    <?php // echo $form->field($model, 'contact_phone_no') ?>

    <?php // echo $form->field($model, 'contact_fax_no') ?>

    <?php // echo $form->field($model, 'manager_name') ?>

    <?php // echo $form->field($model, 'manager_s_d_w_o') ?>

    <?php // echo $form->field($model, 'manager_address') ?>

    <?php // echo $form->field($model, 'manager_mobile') ?>

    <?php // echo $form->field($model, 'manager_email') ?>

    <?php // echo $form->field($model, 'applicant_name') ?>

    <?php // echo $form->field($model, 'applicant_s_d_w_o') ?>

    <?php // echo $form->field($model, 'applicant_dob') ?>

    <?php // echo $form->field($model, 'applicant_designation') ?>

    <?php // echo $form->field($model, 'applicant_aadhar_no') ?>

    <?php // echo $form->field($model, 'applicant_mobile') ?>

    <?php // echo $form->field($model, 'applicant_email') ?>

    <?php // echo $form->field($model, 'applicant_phone_no') ?>

    <?php // echo $form->field($model, 'applicant_fax_no') ?>

    <?php // echo $form->field($model, 'correspondence_address_line1') ?>

    <?php // echo $form->field($model, 'correspondence_address_line2') ?>

    <?php // echo $form->field($model, 'correspondence_address_district') ?>

    <?php // echo $form->field($model, 'correspondence_address_state') ?>

    <?php // echo $form->field($model, 'correspondence_address_country') ?>

    <?php // echo $form->field($model, 'correspondence_address_pincode') ?>

    <?php // echo $form->field($model, 'correspondence_address_mobile') ?>

    <?php // echo $form->field($model, 'correspondence_address_email') ?>

    <?php // echo $form->field($model, 'correspondence_address_phone_no') ?>

    <?php // echo $form->field($model, 'correspondence_address_fax_no') ?>

    <?php // echo $form->field($model, 'registered_office_address_line1') ?>

    <?php // echo $form->field($model, 'registered_office_address_line2') ?>

    <?php // echo $form->field($model, 'registered_office_address_district') ?>

    <?php // echo $form->field($model, 'registered_office_address_state') ?>

    <?php // echo $form->field($model, 'registered_office_address_country') ?>

    <?php // echo $form->field($model, 'registered_office_address_pincode') ?>

    <?php // echo $form->field($model, 'registered_office_address_fax_no') ?>

    <?php // echo $form->field($model, 'project_name') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'line_of_activity') ?>

    <?php // echo $form->field($model, 'pollution_category') ?>

    <?php // echo $form->field($model, 'project_new_or_expansion') ?>

    <?php // echo $form->field($model, 'proposed_production_date') ?>

    <?php // echo $form->field($model, 'women_entrepreneur') ?>

    <?php // echo $form->field($model, 'differently_abled') ?>

    <?php // echo $form->field($model, 'minority') ?>

    <?php // echo $form->field($model, 'direct_male') ?>

    <?php // echo $form->field($model, 'direct_female') ?>

    <?php // echo $form->field($model, 'indirect_male') ?>

    <?php // echo $form->field($model, 'indirect_female') ?>

    <?php // echo $form->field($model, 'value_of_land') ?>

    <?php // echo $form->field($model, 'value_of_building') ?>

    <?php // echo $form->field($model, 'value_of_plant_and_machinery') ?>

    <?php // echo $form->field($model, 'total_project_value') ?>

    <?php // echo $form->field($model, 'industry_type') ?>

    <?php // echo $form->field($model, 'type_of_land') ?>

    <?php // echo $form->field($model, 'name_of_industrial_area') ?>

    <?php // echo $form->field($model, 'land_use_type') ?>

    <?php // echo $form->field($model, 'plot_number') ?>

    <?php // echo $form->field($model, 'proposed_site_address_line1') ?>

    <?php // echo $form->field($model, 'proposed_site_district') ?>

    <?php // echo $form->field($model, 'proposed_site_tehsil') ?>

    <?php // echo $form->field($model, 'proposed_site_area') ?>

    <?php // echo $form->field($model, 'proposed_site_pincode') ?>

    <?php // echo $form->field($model, 'proposed_site_telephone') ?>

    <?php // echo $form->field($model, 'proposed_site_total_extend_of_site_area') ?>

    <?php // echo $form->field($model, 'proposed_site_area_for_development') ?>

    <?php // echo $form->field($model, 'proposed_site_total_built_area') ?>

    <?php // echo $form->field($model, 'proposed_site_height_of_building') ?>

    <?php // echo $form->field($model, 'proposed_site_building_plan') ?>

    <?php // echo $form->field($model, 'line_manufacture_product_name') ?>

    <?php // echo $form->field($model, 'line_manufacture_quantity') ?>

    <?php // echo $form->field($model, 'line_manufacture_unit') ?>

    <?php // echo $form->field($model, 'raw_materials_item') ?>

    <?php // echo $form->field($model, 'raw_materials_quantity') ?>

    <?php // echo $form->field($model, 'raw_materials_unit') ?>

    <?php // echo $form->field($model, 'production_capacity') ?>

    <?php // echo $form->field($model, 'production_capacity_unit') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
