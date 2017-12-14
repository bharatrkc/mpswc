<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CafSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cafs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caf-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caf', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'investor_id',
            'unit_name',
            'constitution',
            'registration_no',
            // 'registration_date',
            // 'company_website',
            // 'pan_number',
            // 'contact_name',
            // 'contact_designation',
            // 'contact_mobile',
            // 'contact_email:email',
            // 'contact_phone_no',
            // 'contact_fax_no',
            // 'manager_name',
            // 'manager_s_d_w_o',
            // 'manager_address',
            // 'manager_mobile',
            // 'manager_email:email',
            // 'applicant_name',
            // 'applicant_s_d_w_o',
            // 'applicant_dob',
            // 'applicant_designation',
            // 'applicant_aadhar_no',
            // 'applicant_mobile',
            // 'applicant_email:email',
            // 'applicant_phone_no',
            // 'applicant_fax_no',
            // 'correspondence_address_line1',
            // 'correspondence_address_line2',
            // 'correspondence_address_district',
            // 'correspondence_address_state',
            // 'correspondence_address_country',
            // 'correspondence_address_pincode',
            // 'correspondence_address_mobile',
            // 'correspondence_address_email:email',
            // 'correspondence_address_phone_no',
            // 'correspondence_address_fax_no',
            // 'registered_office_address_line1',
            // 'registered_office_address_line2',
            // 'registered_office_address_district',
            // 'registered_office_address_state',
            // 'registered_office_address_country',
            // 'registered_office_address_pincode',
            // 'registered_office_address_fax_no',
            // 'project_name',
            // 'category',
            // 'sector',
            // 'line_of_activity',
            // 'pollution_category',
            // 'project_new_or_expansion',
            // 'proposed_production_date',
            // 'women_entrepreneur',
            // 'differently_abled',
            // 'minority',
            // 'direct_male',
            // 'direct_female',
            // 'indirect_male',
            // 'indirect_female',
            // 'value_of_land',
            // 'value_of_building',
            // 'value_of_plant_and_machinery',
            // 'total_project_value',
            // 'industry_type',
            // 'type_of_land',
            // 'name_of_industrial_area',
            // 'land_use_type',
            // 'plot_number',
            // 'proposed_site_address_line1',
            // 'proposed_site_district',
            // 'proposed_site_tehsil',
            // 'proposed_site_area',
            // 'proposed_site_pincode',
            // 'proposed_site_telephone',
            // 'proposed_site_total_extend_of_site_area',
            // 'proposed_site_area_for_development',
            // 'proposed_site_total_built_area',
            // 'proposed_site_height_of_building',
            // 'proposed_site_building_plan',
            // 'line_manufacture_product_name',
            // 'line_manufacture_quantity',
            // 'line_manufacture_unit',
            // 'raw_materials_item',
            // 'raw_materials_quantity',
            // 'raw_materials_unit',
            // 'production_capacity',
            // 'production_capacity_unit',
            // 'created',
            // 'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
