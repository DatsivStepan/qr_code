<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <div class="col-sm-12">
        <?php echo $this->render('menu'); ?>
    </div>
    <div class="col-sm-12">
        <?php foreach($freeOrders as $order){ ?>
            <div class="well">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Addres</b></td>
                        <td><b>Stan</b></td>
                        <td><b>date</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?php echo $order->id;?></td>
                        <td><?= $order->name; ?></td>
                        <td><?php  echo $order->addres; ?></td>
                        <td><?php  echo $order->stan; ?></td>
                        <td><?php  echo $order->date; ?></td>
                        <td><?= HTML::a('Show', array('work/ordershow','id'=>$order->id ),array('class'=>'btn btn-default')); ?></td>
                    </tr>
                </tbody>
                </table> 
            </div>
        <?php } ?>
    </div>
    <div>
        <?php  echo LinkPager::widget(['pagination'=>$pagination]); ?>
    </div>
</div>
