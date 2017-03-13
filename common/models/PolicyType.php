<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "policy_type".
 *
 * @property integer $id
 * @property string $policy_name
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property PolicyDetails[] $policyDetails
 */
class PolicyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'policy_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['policy_name', 'CB', 'UB'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['policy_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'policy_name' => 'Policy Name',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolicyDetails()
    {
        return $this->hasMany(PolicyDetails::className(), ['policy_type' => 'id']);
    }
}
