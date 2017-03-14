<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $dob
 * @property integer $gender
 * @property integer $marital_status
 * @property string $occupation
 * @property double $annual_income
 * @property string $address
 * @property string $contact_number
 * @property string $email
 * @property integer $existing_sick_benifits
 * @property integer $home_owner
 * @property string $spouse_name
 * @property string $spouse_dob
 * @property string $spouse_occupation
 * @property integer $no_of_children
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Children[] $childrens
 */
class Customer extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'customer';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['first_name', 'last_name', 'occupation', 'contact_number', 'email', 'annual_income', 'address', 'dob'], 'required'],
                        [['dob', 'spouse_dob', 'DOC', 'DOU'], 'safe'],
                        [['email'], 'email'],
                        [['gender', 'marital_status', 'existing_sick_benifits', 'home_owner', 'no_of_children', 'status', 'CB', 'UB'], 'integer'],
                        [['annual_income'], 'number'],
                        [['address'], 'string'],
                        [['first_name', 'last_name', 'occupation', 'contact_number', 'email', 'spouse_name', 'spouse_occupation'], 'string', 'max' => 100],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'dob' => 'Date of Birth',
                    'gender' => 'Gender',
                    'marital_status' => 'Marital Status',
                    'occupation' => 'Occupation',
                    'annual_income' => 'Annual Income',
                    'address' => 'Address',
                    'contact_number' => 'Contact Number',
                    'email' => 'Email',
                    'existing_sick_benifits' => 'Existing Sick Benifits',
                    'home_owner' => 'Home Owner',
                    'spouse_name' => 'Spouse Name',
                    'spouse_dob' => 'Spouse Date of Birth',
                    'spouse_occupation' => 'Spouse Occupation',
                    'no_of_children' => 'No Of Children',
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
        public function getChildrens() {
                return $this->hasMany(Children::className(), ['customer_id' => 'id']);
        }

}
