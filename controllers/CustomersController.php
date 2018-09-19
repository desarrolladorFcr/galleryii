<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Customers;
use app\models\Employees;
use yii\helpers\ArrayHelper;

class CustomersController extends Controller {
    public function actionIndex(){
        $customers = new Customers();
        return $this->render('index', ['model'=>$customers]);
    }
    
    public function actionCreate(){
        $model = new Customers();
        $employModel = new Employees();
        $employes = $employModel->find()->asArray()->all();
        $employMap = ArrayHelper::map($employes, 'employeeNumber', function ($employes){
        
            return $employes['firstName'].' '.$employes['lastName'];
        });
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(['customers/index']);
        }else{
            return $this->render('create', ['model' => $model, 'employees' => $employMap]);
        }
    }
    
    public function actionUpdate($id){
        $customersModel = new Customers();
        $employesModel  = new Employees();
        $employes = $employesModel->find()->asArray()->all();
        $model = $customersModel->find()->where(['customerNumber' => $id])->one();
        $employMap = ArrayHelper::map($employes, 'employeeNumber', function($employes){
            return $employes['firstName'].' '.$employes['lastName'];
        });
        
        if(Yii::$app->request->post()){
            $customers = Yii::$app->request->post('Customers');
            $model->customerName = $customers['customerName'];
            $model->contactLastName = $customers['contactLastName'];
            $model->contactFirstName = $customers['contactFirstName'];
            $model->phone = $customers['phone'];
            $model->addressLine1 = $customers['addressLine1'];
            $model->addressLine2 = $customers['addressLine2'];
            $model->city = $customers['city'];
            $model->state = $customers['state'];
            $model->postalCode = $customers['postalCode'];
            $model->country = $customers['country'];
            $model->salesRepEmployeeNumber = $customers['salesRepEmployeeNumber'];
            $model->creditLimit = $customers['creditLimit'];
            $model->save();
            return $this->redirect(['customers/index']);
        }else{
            return $this->render('update', ['model' => $model, 'employees' => $employMap]);
        }
    }
}