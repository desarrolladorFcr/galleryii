<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\BaseUrl;

$this->title = 'Customers';
?>
<div>
    <a href="<?= BaseUrl::base(true).'/customers/create'?>">Crear cliente</a>
</div>    
<div class="col-md-12 col-lg-12 text-center">
    <h1>Customers</h1>
    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => $model::find(),
        'pagination' => [
            'pageSize' => 5
        ]
            ])
    ?>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'Customer Number',
                'attribute' => 'customerNumber'
            ],
            'customerName',
            [
                'label' => 'Contact',
                'value' => function ($data) {
                    return $data->contactFirstName . ' ' . $data->contactLastName;
                }
            ],
            'phone',
            [
                'label' => 'Credit Limit',
                'value' => function ($data) {
                    return Yii::$app->siteHelper->dollarFormat($data->creditLimit);
                }
            ],
            [
                'label' => 'employee account',
                'format' => 'html',
                'value' => function ($data){
                    
                    if(!empty($data->employee->firstName) && !empty($data->employee->lastName)){
                        $name = $data->employee->firstName.' '.$data->employee->lastName;
                        return  Yii::$app->siteHelper->linkShow('employees', $name, $data->salesRepEmployeeNumber);
                    }
                }
            ],
            [
                'label' => '',
                'format' => 'html',
                'value' => function ($data){
                    return  '<a href="'.Yii::$app->siteHelper->get_route('customers/update?id='.$data['customerNumber']).'"><i class="material-icons">create</i></a>';
                }
            ]        
        ]
    ]);
    ?>
    
    <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
           value="<?=Yii::$app->request->csrfToken?>"/>
</div>