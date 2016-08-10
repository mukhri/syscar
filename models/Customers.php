<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $customerNumber
 * @property string $customerName
 * @property string $contactLastName
 * @property string $contactFirstName
 * @property string $phone
 * @property string $addressLine1
 * @property string $addressLine2
 * @property string $city
 * @property string $state
 * @property string $postalCode
 * @property string $country
 * @property integer $salesRepEmployeeNumber
 * @property string $creditLimit
 *
 * @property Employees $salesRepEmployeeNumber0
 * @property Orders[] $orders
 * @property Payments[] $payments
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerNumber', 'customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'city', 'country'], 'required'],
            [['customerNumber', 'salesRepEmployeeNumber'], 'integer'],
            [['creditLimit'], 'number'],
            [['customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'country'], 'string', 'max' => 50],
            [['postalCode'], 'string', 'max' => 15],
            [['salesRepEmployeeNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['salesRepEmployeeNumber' => 'employeeNumber']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerNumber' => Yii::t('app', 'Customer Number'),
            'customerName' => Yii::t('app', 'Customer Name'),
            'contactLastName' => Yii::t('app', 'Contact Last Name'),
            'contactFirstName' => Yii::t('app', 'Contact First Name'),
            'phone' => Yii::t('app', 'Phone'),
            'addressLine1' => Yii::t('app', 'Address Line1'),
            'addressLine2' => Yii::t('app', 'Address Line2'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'postalCode' => Yii::t('app', 'Postal Code'),
            'country' => Yii::t('app', 'Country'),
            'salesRepEmployeeNumber' => Yii::t('app', 'Sales Rep Employee Number'),
            'creditLimit' => Yii::t('app', 'Credit Limit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesRepEmployeeNumber0()
    {
        return $this->hasOne(Employees::className(), ['employeeNumber' => 'salesRepEmployeeNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['customerNumber' => 'customerNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['customerNumber' => 'customerNumber']);
    }

    /**
     * @inheritdoc
     * @return CustomersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomersQuery(get_called_class());
    }
}
