<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "policy_details".
 *
 * @property integer $id
 * @property integer $company
 * @property integer $product
 * @property integer $policy_type
 * @property integer $cover
 * @property string $policy_number
 * @property double $sum_assured
 * @property string $policy_term
 * @property string $cover_start_date
 * @property string $cover_end_date
 * @property integer $application_status
 * @property integer $underwriting_outcome
 * @property integer $policy_status
 * @property string $reason
 * @property string $review_date
 * @property string $renewal_date
 * @property double $commision
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property ApplicationStatus $applicationStatus
 * @property CompanyDetails $company0
 * @property Cover $cover0
 * @property PolicyType $policyType
 * @property Product $product0
 */
class PolicyDetails extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'policy_details';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['company', 'product', 'policy_type', 'cover', 'application_status', 'CB', 'UB'], 'required'],
                        [['company', 'product', 'policy_type', 'cover', 'application_status', 'underwriting_outcome', 'policy_status', 'status', 'CB', 'UB'], 'integer'],
                        [['sum_assured', 'commision'], 'number'],
                        [['cover_start_date', 'cover_end_date', 'review_date', 'renewal_date', 'DOC', 'DOU'], 'safe'],
                        [['reason'], 'string'],
                        [['policy_number', 'policy_term'], 'string', 'max' => 100],
                        [['application_status'], 'exist', 'skipOnError' => true, 'targetClass' => ApplicationStatus::className(), 'targetAttribute' => ['application_status' => 'id']],
                        [['company'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyDetails::className(), 'targetAttribute' => ['company' => 'id']],
                        [['cover'], 'exist', 'skipOnError' => true, 'targetClass' => Cover::className(), 'targetAttribute' => ['cover' => 'id']],
                        [['policy_type'], 'exist', 'skipOnError' => true, 'targetClass' => PolicyType::className(), 'targetAttribute' => ['policy_type' => 'id']],
                        [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product' => 'id']],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'company' => 'Company',
                    'product' => 'Product',
                    'policy_type' => 'Policy Type',
                    'cover' => 'Cover',
                    'policy_number' => 'Policy Number',
                    'sum_assured' => 'Sum Assured',
                    'policy_term' => 'Policy Term',
                    'cover_start_date' => 'Cover Start Date',
                    'cover_end_date' => 'Cover End Date',
                    'application_status' => 'Application Status',
                    'underwriting_outcome' => 'Underwriting Outcome',
                    'policy_status' => 'Policy Status',
                    'reason' => 'Reason (if policy status is canceled)',
                    'review_date' => 'Review Date',
                    'renewal_date' => 'Renewal Date',
                    'commision' => 'Commision',
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
        public function getApplicationStatus() {
                return $this->hasOne(ApplicationStatus::className(), ['id' => 'application_status']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getCompany0() {
                return $this->hasOne(CompanyDetails::className(), ['id' => 'company']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getCover0() {
                return $this->hasOne(Cover::className(), ['id' => 'cover']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPolicyType() {
                return $this->hasOne(PolicyType::className(), ['id' => 'policy_type']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getProduct0() {
                return $this->hasOne(Product::className(), ['id' => 'product']);
        }

}
