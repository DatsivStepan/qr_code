<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap" style="border-radius:4px ;">
    <div class="col-sm-12"> <h2>Done</h2> </div>
    <div class="col-sm-12">
        <?php foreach($myOrders as $order){ ?>
            <div class="well">
            <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><b>Name</b></td>
                    <td><?= $order->name; ?></td>
                </tr>
                <tr>
                    <td><b>Addres</b></td>
                    <td><?= $order->addres; ?></td>
                </tr>
                <tr>
                    <td><b>Stan</b></td>
                    <td><?= $order->stan; ?></td>
                </tr>
                <tr>
                    <td><b>Stan</b></td>
                    <td><?= $order->qr_code_url; ?></td>
                </tr>
                <tr>
                    <td><b>Stan</b></td>
                    <td><?= $order->date; ?></td>
                </tr>
            </tbody>
            </table>
                <div class='row' align='right'>    
                    <?= HTML::a('Show', array('work/ordershow','id'=>$order->id ),array('class'=>'btn btn-default')); ?>
                </div>
            </div>
        <?php } ?>
        </div>
    <div>
        <?php  echo LinkPager::widget(['pagination'=>$pagination]); ?>
    </div>
</div>
