<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%services}}".
 *
 * @property integer $id
 * @property string $services
 * @property string $department
 * @property string $when_approval_required
 * @property string $minimum_eligibility
 * @property string $act_rule
 * @property string $validity_of_approval
 * @property string $procedure_for_applying
 * @property string $website
 * @property string $time_limit
 * @property string $authority_responsible
 * @property string $notified_under_public
 * @property string $any_other_special_condition
 * @property string $type_of_industry
 * @property string $industry_status
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['when_approval_required', 'minimum_eligibility', 'act_rule', 'validity_of_approval', 'procedure_for_applying', 'time_limit', 'authority_responsible', 'type_of_industry'], 'string'],
            [['industry_status'], 'required'],
            [['services', 'department', 'website', 'notified_under_public', 'any_other_special_condition', 'industry_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'services' => 'Services',
            'department' => 'Department',
            'when_approval_required' => 'When Approval Required',
            'minimum_eligibility' => 'Minimum Eligibility',
            'act_rule' => 'Act Rule',
            'validity_of_approval' => 'Validity Of Approval',
            'procedure_for_applying' => 'Procedure For Applying',
            'website' => 'Website',
            'time_limit' => 'Time Limit',
            'authority_responsible' => 'Authority Responsible',
            'notified_under_public' => 'Notified Under Public',
            'any_other_special_condition' => 'Any Other Special Condition',
            'type_of_industry' => 'Type Of Industry',
            'industry_status' => 'Industry Status',
        ];
    }
}
