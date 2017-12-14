<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_manufacturing_of_boilers_under_boilers_act_1923}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name_of_manufacturer
 * @property string $name_of_part
 * @property integer $works_no
 * @property integer $drawing_no
 * @property string $name_of_project
 * @property string $customer_name
 * @property string $address
 * @property integer $design_working_pressure
 * @property integer $design_working_temperature
 * @property integer $power_generating_in_mega_watt
 * @property string $created
 * @property string $updated
 */
class ServiceManufacturingOfBoilersUnderBoilersAct1923 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_manufacturing_of_boilers_under_boilers_act_1923}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'name_of_manufacturer', 'name_of_part', 'works_no', 'drawing_no', 'name_of_project', 'customer_name', 'address', 'design_working_pressure', 'design_working_temperature', 'power_generating_in_mega_watt'], 'required'],
            [['project_id', 'works_no', 'drawing_no', 'design_working_pressure', 'design_working_temperature', 'power_generating_in_mega_watt'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name_of_manufacturer', 'name_of_part', 'name_of_project', 'customer_name', 'address'], 'string', 'max' => 255],
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
            'name_of_manufacturer' => 'Name Of Manufacturer',
            'name_of_part' => 'Name Of Part',
            'works_no' => 'Works No',
            'drawing_no' => 'Drawing No',
            'name_of_project' => 'Name Of Project',
            'customer_name' => 'Customer Name',
            'address' => 'Address',
            'design_working_pressure' => 'Design Working Pressure',
            'design_working_temperature' => 'Design Working Temperature',
            'power_generating_in_mega_watt' => 'Power Generating In Mega Watt',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
