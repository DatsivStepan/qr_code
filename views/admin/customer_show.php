<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div class="row wrap forWrap">
    <div class="col-sm-12">
        <div class='col-sm-12' align='center' style='margin-top:-10px;'><h2>Customer Profile</h2></div>
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><b>#</b></td>
                    <td><b>First name</b></td>
                    <td><b>Last name</b></td>
                    <td><b>e-mail</b></td>
                    <td><?php  echo Html::a('Edit', array('admin/customeredit', 'id' => $modelCustomer->id), array('class' =>'btn btn-default')); ?></td>
                </tr>
                <tr>
                    <td><?= $modelCustomer->id?></td>
                    <td><?= $modelCustomer->first_name?></td>
                    <td><?= $modelCustomer->last_name?></td>
                    <td><?= $modelCustomer->e_mail;?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>