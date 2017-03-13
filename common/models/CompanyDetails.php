<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_details".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $company_logo
 * @property string $contact_person
 * @property string $position
 * @property integer $phone
 * @property string $email
 * @property string $website_link
 * @property string $agency_details
 * @property string $remarks
 * @property string $user_name
 * @property string $password
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property CompanyContacts[] $companyContacts
 */
class CompanyDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'status', 'CB', 'UB'], 'integer'],
            [['agency_details', 'remarks'], 'string'],
            [['CB', 'UB'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['company_name', 'company_logo', 'contact_person', 'position', 'email', 'website_link', 'user_name', 'password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_logo' => 'Company Logo',
            'contact_person' => 'Contact Person',
            'position' => 'Position',
            'phone' => 'Phone',
            'email' => 'Email',
            'website_link' => 'Website Link',
            'agency_details' => 'Agency Details',
            'remarks' => 'Remarks',
            'user_name' => 'User Name',
            'password' => 'Password',
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
    public function getCompanyContacts()
    {
        return $this->hasMany(CompanyContacts::className(), ['company_id' => 'id']);
    }
}
