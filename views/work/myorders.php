<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <div class="col-sm-12">
        <?php echo $this->render('menu'); ?>
    </div>
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
