<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Customers
 *
 * @author t01
 */
class Customers extends \yii\db\ActiveRecord {
    
    public static function tableName() {
        return 'customers';
    }

    public function rules() {
        return [
            [['customerNumber'], 'unique'],
            [['customerNumber'], 'integer'],
            [['customerNumber', 'customerName', 'contactLastName', 'contactFirstName', 'phone', 
                'city', 'state', 'postalCode', 'country', 'salesRepEmployeeNumber', 'creditLimit'], 'required'],
            [['creditLimit'], 'double']
        ];
    }

    public function getEmployee() {
        return $this->hasOne(Employees::className(), ['employeeNumber' => 'salesRepEmployeeNumber']);
    }

}
