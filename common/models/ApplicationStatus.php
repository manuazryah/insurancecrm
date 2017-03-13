<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application_status".
 *
 * @property integer $id
 * @property string $application_sttus
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property PolicyDetails[] $policyDetails
 */
class ApplicationStatus extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'application_status';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['application_status', 'CB', 'UB'], 'required'],
                        [['status', 'CB', 'UB'], 'integer'],
                        [['DOC', 'DOU'], 'safe'],
                        [['application_status'], 'string', 'max' => 100],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'application_status' => 'Application Status',
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
        public function getPolicyDetails() {
                return $this->hasMany(PolicyDetails::className(), ['application_status' => 'id']);
        }

}
