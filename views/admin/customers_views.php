<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>
<div class="row wrap" style="padding:20px;">
    <h1>Customers</h1>
    <table class="table table-striped table-hover">
    <tbody>
        <tr>
            <td><b>#</b></td>
            <td><b>E-mail</b></td>
            <td><b>Ім'я</b></td>
            <td><b>Прізвище</b></td>
            <td> </td>
        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer->id;?></td>
                <td><?php  echo $customer->e_mail; ?></td>
                <td><?= HTML::a($customer->first_name, ['admin/customershow', 'id' => $customer->id]) ?></td>
                <td><?php  echo $customer->last_name; ?></td>
                <td><?php  echo Html::a('Delete', array('admin/customerdelete','id'=>$customer->id ),array('class'=>'btn btn-default')); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <div>
        <?php  echo LinkPager::widget(['pagination'=>$pagination]); ?>
    </div>
</div>