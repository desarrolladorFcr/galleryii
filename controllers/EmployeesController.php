<?php

namespace app\controllers;

use app\models\Employees;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

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
        
    }

    public function actionView($id) {

        if(!empty($id)) {
            $employee = Employees::find()->where(['employeeNumber' => $id])->one();
            return $this->render('view', [
                        'model' => $employee
            ]);
        }
    }

}
