<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap forWrap">
    <div class=col-sm-12>
        <?php if(Yii::$app->session->hasFlash('OrderDeleted')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'Order delete!',
            ]);
            ?>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('OrderAdd')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'Order add!',
            ]);
            ?>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('OrderNotAdd')): ?>
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => 'Order not delete!',
            ]);
            ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-12 col-xs-12">
        <div class="col-sm-12 noprint" style="margin-top:10px;">
            <?php echo $this->render('menu'); ?>
        </div>
        <div class="col-sm-12">
            <?php echo $this->render('add_order', array('modelOrder' => $modelOrder, 'customer' => $customer)); ?>
        </div>
        <div class="col-sm-12">
            <?php echo $this->render('orders_views', array('orders' => $orders, 'pagination' => $pagination, 'count' => $count)); ?>
        </div>
    </div>
</div>