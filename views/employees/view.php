<?php $this->title = $model->firstName . ' ' . $model->lastName ?>
<div id="employees_view">
    <h3><?= $model->firstName . ' ' . $model->lastName ?></h3>
    <div class="row">
        <div class="col-md-12 card">
            Email: <br>
            <?= $model->email ?>
        </div>
        <div class="col-md-12 card">
            Extension: <br>
            <?= $model->extension ?>
        </div>
        <div class="col-md-12 card">
            JobTitle: <br>
            <?= $model->jobTitle ?>
        </div>
        <div class="col-md-12 card">
            Office Code<br> 
            City:<br>
            <?= $model->office->city ?><br>
            Estate: <br>
            <?= $model->office->state ?><br>
            Country:<br>
            <?= $model->office->country ?><br>
            Phone:<br>
            <?= $model->office->phone ?><br>
            Territory:<br>
            <?= $model->office->territory ?><br>
            Report to:<br>
            <?= $model->reportsTo ?>
        </div>
        <div class="col-md-12 card">
        </div>
        <div class="col-md-12">
            <h5>Clientes</h5>
            <?php if (is_array($model->customers)): ?>
                <?php foreach ($model->customers as $cl => $vl): ?>
                <div class="cart card alert-danger col-md-12">
                        <?= $vl->customerNumber ?>
                        <?= $vl->customerName?>
                    </div>    
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>    
</div>
