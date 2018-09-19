<?php


namespace app\models;

class Employees extends \yii\db\ActiveRecord{
    public static function tableName(){
        return 'employees';
    }
    
    public function getCustomers(){
        return $this->hasMany(Customers::className(), ['salesRepEmployeeNumber' => 'employeeNumber']);
    }
    
    public function getOffice(){
        return $this->hasOne(Offices::className(), ['officeCode' => 'officeCode']);
    }
}
