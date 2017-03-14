<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "children".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property integer $gender
 * @property string $dob
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Customer $customer
 */
class Children extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'children';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['customer_id', 'CB', 'UB'], 'required'],
                        [['customer_id', 'gender', 'status', 'CB', 'UB'], 'integer'],
                        [['dob', 'DOC', 'DOU'], 'safe'],
                        [['name'], 'string', 'max' => 100],
                        [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'customer_id' => 'Customer ID',
                    'name' => 'Name',
                    'gender' => 'Gender',
                    'dob' => 'Date of Birth',
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
        public function getCustomer() {
                return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
        }

}
