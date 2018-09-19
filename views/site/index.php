<?php
use yii\BaseYii;
use yii\helpers\BaseUrl;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <table class="table table-bordered">
        <tr>
            <th>
                @app
            </th>
            <td>
                <?= BaseYii::getAlias('@app')?>
            </td>    
        </tr>
        <tr>
            <th>
                @vendor
            </th>
            <td>
            <?= BaseYii::getAlias('@vendor')?>
            </td>
        </tr>
        <tr>
            <th>
                @web
            </th>
            <td>
                <?= BaseYii::getAlias('@web')?>
            </td>    
        </tr>
        <tr>
            <th>
                webroot
            </th>
            <td>
                <?= BaseYii::getAlias('@webroot')?>
            </td>    
        </tr>
        <tr>
            <th>
                BaseUrl::base(true)
            </th>
            <td>
                <?= BaseUrl::base(true)?>
            </td>    
        </tr> 
    </table>    
    <a href="<?= BaseUrl::base(true).'/customers/index'?>"> Acceso a clientes </a>
</div>
