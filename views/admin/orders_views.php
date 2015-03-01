<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap" style="padding:20px;">
    <h1>Orders</h1>
    <table class="table table-striped table-hover">
    <tbody>
        <tr>
            <td><b>#</b></td>
            <td><b>name</b></td>
            <td><b>Addres</b></td>
            <td><b>Stan</b></td>
            <td><b>Create Time</b></td>
            <td> </td>
        </tr>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order->id;?></td>
                <td><?= HTML::a($order->name, ['admin/ordershow', 'id' => $order->id]) ?></td>
                <td><?php  echo $order->addres; ?></td>
                <td><?php  echo $order->stan; ?></td>
                <td><?php  echo $order->date; ?></td>
                <td><?php  echo Html::a('Delete', array('admin/orderdelete','id'=>$order->id ),array('class'=>'btn btn-default')); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <div>
        <?php  echo LinkPager::widget(['pagination'=>$pagination]); ?>
    </div>
</div>