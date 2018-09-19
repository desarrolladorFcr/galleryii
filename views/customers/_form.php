<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
?>

<?php $form = ActiveForm::begin(); ?>

    <?php if(empty($model->customerNumber)):?>
        <?= $form->field($model, 'customerNumber') ?>
    <?php endif?>
    
    <?= $form->field($model, 'customerName')?>
    <?= $form->field($model, 'contactLastName')?>
    <?= $form->field($model, 'contactFirstName')?>
    <?= $form->field($model, 'phone')?>
    <?= $form->field($model, 'addressLine1')?>
    <?= $form->field($model, 'addressLine2')?>
    <?= $form->field($model, 'city')?>
    <?= $form->field($model, 'state')?>
    <?= $form->field($model, 'postalCode')?>
    <?= $form->field($model, 'country')?>   
    <label>Empleado: </label>
    <?= BaseHtml::activeDropDownList($model, 'salesRepEmployeeNumber', $employees, ['prompt' => 'Seleccione empleado', 'class' => 'form-control'])?>
    
    <?= $form->field($model, 'creditLimit')?>
    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>