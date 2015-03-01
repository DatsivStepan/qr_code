<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>
<div class="row wrap" style="padding:20px;">    
    <div class='col-sm-12' align='center' style='margin-top:-30px;'><h2>WorkMan Profile</h2></div>
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <td><b>#</b></td>
                <td><b>Name</b></td>
                <td><b>Addres</b></td>
                <td><b>Date Create</b></td>
                <td><b>Stan</b></td>
                <td><b>Customers</b></td>
                <td id='button_edit'><?php  echo Html::a('Edit', array('admin/orderedit', 'id' => $modelOrder->id), array('class' =>'btn btn-default')); ?></td>
            </tr>
            <tr>
                <td><?= $modelOrder->id?></td>
                <td><?= $modelOrder->name; ?></td>
                <td><?= $modelOrder->addres; ?></td>
                <td><?= $modelOrder->date; ?></td>
                <td><?= $modelOrder->stan; ?></td>
                <td>
                    <p id='printt'><?= $customer->first_name.' '.$customer->last_name; ?></p>
                    <p  id='notPrint'><?= HTML::a($customer->first_name.' '.$customer->last_name, ['admin/customershow', 'id' => $customer->id]) ?></p>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="col-sm-12">
        <div id="text_qr">Text qr_code - <b><?= $modelOrder->qr_code_url; ?></b></div>
        <div id="canva_qr"></div>
    </div>
    <div class="col-sm-12">
        <a class='btn btn-default' id='OrdersPrint'>Print</a>
    </div>
</div>