<?php


namespace app\models;

class Offices extends \yii\db\ActiveRecord{
    public static function tableName(){
        return 'offices';
    }
    
    public function getEmployees(){
        return $this->hasMany(Employees::className(), ['officeCode' => 'officeCode']);
    }
}
