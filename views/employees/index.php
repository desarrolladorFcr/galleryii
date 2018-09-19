<?php
$this->title = "Empleados"
?>
<div id="emp_index">
    <div class="text-center">
        <h3>Empleados</h3>
    </div>
    <div>
        <form>
            <select class="form-control" id="select_cli">
                <option value="">Seleccione</option>
                <?php foreach ($employees as $cl => $vl): ?>
                    <option value="<?php echo $vl['employeeNumber'] ?>">
                        <?php echo $vl['firstName'] . ' ' . $vl['lastName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <div class="text-center">Total de creditos limites</div>
    <div id="total_limit" class="text-center">
    </div>
    <div class="text-center">
        Cantidad de clientes
    </div>    
    <div id="cant_clientes" class="text-center">
    </div>    
</div>    
<input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
           value="<?=Yii::$app->request->csrfToken?>"/>
<?php
$this->registerJsFile(
        '@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
