<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_contacts".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $email
 * @property integer $telephone
 * @property string $position
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property CompanyDetails $company
 */
class CompanyContacts extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'company_contacts';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['company_id', 'CB', 'UB'], 'required'],
                        [['company_id', 'telephone', 'status', 'CB', 'UB'], 'integer'],
                        [['DOC', 'DOU'], 'safe'],
                        [['email'], 'email'],
                        [['name', 'email', 'position'], 'string', 'max' => 100],
                        [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyDetails::className(), 'targetAttribute' => ['company_id' => 'id']],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'company_id' => 'Company ID',
                    'name' => 'Name',
                    'email' => 'Email',
                    'telephone' => 'Telephone',
                    'position' => 'Position',
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
        public function getCompany() {
                return $this->hasOne(CompanyDetails::className(), ['id' => 'company_id']);
        }

}
