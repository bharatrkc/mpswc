<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_water_connection_by_akvn}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $akvn
 * @property string $industrial_area
 * @property string $address
 * @property string $plot_number
 * @property string $pincode
 * @property string $size_of_water_connection_applied
 * @property string $water_requirement
 * @property string $created
 * @property string $updated
 */
class ServiceWaterConnectionByAkvn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_water_connection_by_akvn}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'akvn', 'industrial_area', 'address', 'plot_number', 'pincode', 'size_of_water_connection_applied', 'water_requirement'], 'required'],
            [['project_id', 'water_requirement', 'pincode'], 'integer'],
            [['address'], 'string'],
            [['created', 'updated'], 'safe'],
            [['akvn', 'industrial_area', 'plot_number', 'size_of_water_connection_applied'], 'string', 'max' => 255],
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
            'akvn' => 'Akvn',
            'industrial_area' => 'Industrial Area',
            'address' => 'Address',
            'plot_number' => 'Plot Number',
            'pincode' => 'Pincode',
            'size_of_water_connection_applied' => 'Size Of Water Connection Applied',
            'water_requirement' => 'Water Requirement',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
