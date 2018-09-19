<?php

namespace app\controllers;

use app\models\Employees;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use Yii;

class EmployeesController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $empModel = new Employees(); 
        $employees = $empModel->find()->asArray()->all();
        
        return $this->render('index', [
            'employees' => $employees
        ]);
    }

    public function actionView($id) {

        if(!empty($id)) {
            $employee = Employees::find()->where(['employeeNumber' => $id])->one();
            return $this->render('view', [
                        'model' => $employee
            ]);
        }
    }
    
    public function actionCreditLimiForEmploye(){
        $employeId = $_POST['id'];
        $stn = "select SUM(creditLimit) as creditLimit from customers where salesRepEmployeeNumber=".$employeId;
        $res = Yii::$app->db->createCommand($stn)->queryAll();
        echo json_encode($res);
    }
    
    public function actionSumaClientes(){
        $employeId = $_POST['id'];
        $comand = new Command();
    }

}
