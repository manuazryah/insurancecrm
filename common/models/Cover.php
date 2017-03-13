<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cover".
 *
 * @property integer $id
 * @property string $cover
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property PolicyDetails[] $policyDetails
 */
class Cover extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cover';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cover', 'CB', 'UB'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['cover'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover' => 'Cover',
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
        return $this->hasMany(PolicyDetails::className(), ['cover' => 'id']);
    }
}
