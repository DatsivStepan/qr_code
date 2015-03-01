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
            <td><b>Username</b></td>
            <td><b>First name</b></td>
            <td><b>Last name</b></td>
            <td><b>e-mail</b></td>
            <td><?php  echo Html::a('Edit', array('admin/useredit', 'id' => $modelUser->id), array('class' =>'btn btn-default')); ?></td>
        </tr>
        <tr>
            <td><?= $modelUser->id?></td>
            <td><?= $modelUser->username; ?></td>
            <td><?= $modelUser->first_name?></td>
            <td><?= $modelUser->last_name?></td>
            <td><?= $modelUser->e_mail;?></td>
            <td></td>
        </tr>
    </tbody>
    </table>
    
    <div class="row">
    <div class="col-sm-12" align='center' style='margin-top:-20px;border-bottom:1px solid #cccccc;'><h1>Workman Orders<h1></div>
        <div class="col-sm-4">
            <?php echo $this->render('myorders_done',['myOrders' => $myOrders_done, 'pagination' => $pagination_done, 'count' => $count_done]); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->render('myorders_working',['myOrders' => $myOrders_working, 'pagination' => $pagination_working, 'count' => $count_working]); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->render('myorders_notwork',['myOrders' => $myOrders_notwork, 'pagination' => $pagination_notwork, 'count' => $count_notwork]); ?>
        </div>
    </div>
</div>